<?php

namespace App\Test\Controller;

use App\Entity\Cosplay;
use App\Repository\CosplayRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CosplayControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private CosplayRepository $repository;
    private string $path = '/cosplay/';
    private EntityManagerInterface $manager;

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Cosplay::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Cosplay index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'cosplay[nomcp]' => 'Testing',
            'cosplay[descriptioncp]' => 'Testing',
            'cosplay[personnage]' => 'Testing',
            'cosplay[imagecp]' => 'Testing',
            'cosplay[datecreation]' => 'Testing',
            'cosplay[nomma]' => 'Testing',
            'cosplay[idmateriaux]' => 'Testing',
            'cosplay[userid]' => 'Testing',
        ]);

        self::assertResponseRedirects('/cosplay/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Cosplay();
        $fixture->setNomcp('My Title');
        $fixture->setDescriptioncp('My Title');
        $fixture->setPersonnage('My Title');
        $fixture->setImagecp('My Title');
        $fixture->setDatecreation('My Title');
        $fixture->setNomma('My Title');
        $fixture->setIdmateriaux('My Title');
        $fixture->setUserid('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Cosplay');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Cosplay();
        $fixture->setNomcp('My Title');
        $fixture->setDescriptioncp('My Title');
        $fixture->setPersonnage('My Title');
        $fixture->setImagecp('My Title');
        $fixture->setDatecreation('My Title');
        $fixture->setNomma('My Title');
        $fixture->setIdmateriaux('My Title');
        $fixture->setUserid('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'cosplay[nomcp]' => 'Something New',
            'cosplay[descriptioncp]' => 'Something New',
            'cosplay[personnage]' => 'Something New',
            'cosplay[imagecp]' => 'Something New',
            'cosplay[datecreation]' => 'Something New',
            'cosplay[nomma]' => 'Something New',
            'cosplay[idmateriaux]' => 'Something New',
            'cosplay[userid]' => 'Something New',
        ]);

        self::assertResponseRedirects('/cosplay/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getNomcp());
        self::assertSame('Something New', $fixture[0]->getDescriptioncp());
        self::assertSame('Something New', $fixture[0]->getPersonnage());
        self::assertSame('Something New', $fixture[0]->getImagecp());
        self::assertSame('Something New', $fixture[0]->getDatecreation());
        self::assertSame('Something New', $fixture[0]->getNomma());
        self::assertSame('Something New', $fixture[0]->getIdmateriaux());
        self::assertSame('Something New', $fixture[0]->getUserid());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Cosplay();
        $fixture->setNomcp('My Title');
        $fixture->setDescriptioncp('My Title');
        $fixture->setPersonnage('My Title');
        $fixture->setImagecp('My Title');
        $fixture->setDatecreation('My Title');
        $fixture->setNomma('My Title');
        $fixture->setIdmateriaux('My Title');
        $fixture->setUserid('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/cosplay/');
    }
}
