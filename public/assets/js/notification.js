function afficherNotification(message, timing) {
    // Créer l'élément de notification
    var notification = document.createElement('div');
    notification.className = 'notification';
    notification.textContent = message;
    document.body.appendChild(notification);

    // Masquer la notification après un délai
    setTimeout(function() {
        document.body.removeChild(notification);
    }, timing);
}
