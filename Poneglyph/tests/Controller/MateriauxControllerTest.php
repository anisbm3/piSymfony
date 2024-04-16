<?php

namespace App\Test\Controller;

use App\Entity\Materiaux;
use App\Repository\MateriauxRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MateriauxControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private MateriauxRepository $repository;
    private string $path = '/materiaux/';
    private EntityManagerInterface $manager;

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Materiaux::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Materiaux index');

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
            'materiaux[nomma]' => 'Testing',
            'materiaux[typema]' => 'Testing',
            'materiaux[disponibilite]' => 'Testing',
        ]);

        self::assertResponseRedirects('/materiaux/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Materiaux();
        $fixture->setNomma('My Title');
        $fixture->setTypema('My Title');
        $fixture->setDisponibilite('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Materiaux');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Materiaux();
        $fixture->setNomma('My Title');
        $fixture->setTypema('My Title');
        $fixture->setDisponibilite('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'materiaux[nomma]' => 'Something New',
            'materiaux[typema]' => 'Something New',
            'materiaux[disponibilite]' => 'Something New',
        ]);

        self::assertResponseRedirects('/materiaux/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getNomma());
        self::assertSame('Something New', $fixture[0]->getTypema());
        self::assertSame('Something New', $fixture[0]->getDisponibilite());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Materiaux();
        $fixture->setNomma('My Title');
        $fixture->setTypema('My Title');
        $fixture->setDisponibilite('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/materiaux/');
    }
}
