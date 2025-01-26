const notificationSection = document.querySelector("section[data-tab-name='notifiche']");
const notificationHeading = notificationSection.querySelector("h3");
const notificationText = (n) => {
    stato = n.stato.toLowerCase();
    switch (stato) {
        case "p":
            return `È stato ricevuto il pagamento dell'ordine ${n.ordineID} dall'utente ${n.nomeUtente}`;
        case "s":
            return `L'ordine ${n.ordineID} è stato spedito. Riceverai a breve gli articoli ordinati`;
        case "r":
            return `L'ordine ${n.ordineID} è stato ricevuto dall'utente ${n.nomeUtente}`;
        default:
            return "Default text";
    }
}
let loadedNotifications = [];
const displayNotifications = () => {
    fetch(`/notifications.php`)
        .then(response => response.json())
        .then(notifications => {
            if (notifications.length === 0) {
                console.log("No notifications");
            } else {
                notifications.forEach(n => {
                    if (loadedNotifications.filter(id => id == n.notificaID).length == 0) {
                        loadedNotifications.push(n.notificaID);
                        n.text = notificationText(n);
                        const template = document.getElementById("notification-template").content.cloneNode(true);
                        template.querySelector("slot[name='data']").textContent = n.data;
                        template.querySelector("slot[name='text']").textContent = n.text;
                        template.querySelector("button").dataset.codiceNotifica = n.notificaID;
                        if (n.letta) {
                            template.querySelector("button").remove();
                        }
                        // Insert notification after heading
                        notificationHeading.after(template);
                    }
                });
            }
        })
        .catch(error => {
            console.error('Error fetching notifications:', error);
        });
}
const tickRead = (item) => {
    if (item instanceof HTMLButtonElement) {
        fetch(`/notifications.php?notificaID=${item.dataset.codiceNotifica}`)
            .then(response => response.json())
            .then(data => {
                console.log(data);
            });
        item.remove();
    }
}

displayNotifications();
setInterval(() => {
    displayNotifications();
    console.log("Displaying notifications.");
}, 5000);