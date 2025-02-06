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

const tickSent = (item) => {
    if (item instanceof HTMLButtonElement) {
        const ordine = item.dataset.codiceOrdine;
        const stato = "s";
        fetch(`/create_notifications.php?ordineID=${ordine}&stato=${stato}`)
            .then(response => response.json())
            .then(data => {
                console.log(data);
            });
        item.classList.add("hidden");
        updateOrderStates();
    }
}

const tickReceived = (item) => {
    if (item instanceof HTMLButtonElement) {
        const ordine = item.dataset.codiceOrdine;
        const stato = "r";
        fetch(`/create_notifications.php?ordineID=${ordine}&stato=${stato}`)
            .then(response => response.json())
            .then(data => {
                console.log(data);
            });
        item.classList.add("hidden");
    }
}


const tickRead = (item) => {
    if (item instanceof HTMLButtonElement) {
        fetch(`/notifications.php?notificaID=${item.dataset.codiceNotifica}`)
            .then(response => response.json())
            .then(data => {
                console.log(data);
            });
        item.remove();
        displayNotificationCount();
    }
}

const displayNotificationCount = () => {
    fetch(`/notifications.php?count`)
        .then(response => response.json())
        .then(notifications => {
            let n = notifications['numeroNotifiche'];
            if (n <= 0) {
                console.log("No notifications");
                document.getElementById("notificationCircle").classList.add("hidden");
            } else {
                console.log(notifications);
                document.getElementById("notificationCircle").classList.remove("hidden");  
            }
        })
        .catch(error => {
            console.error('Error fetching notifications:', error);
        });
}

const updateOrderStates = () => {
    fetch(`/order_states.php`)
        .then(response => response.json())
        .then(order_states => {
            console.log(order_states);
            order_states.forEach(order => {
                const id = order['ordineID'];
                const stato = order['stato'];
                const dd = document.querySelector(`dd[data-codice-ordine='${id}'`);
                switch(stato) {
                    case "s": 
                        dd.textContent = "Spedito";
                        break;
                    case "p": 
                        dd.textContent = "Pagato";
                        break;
                    case "r": 
                        dd.textContent = "Ricevuto";
                        break;
                    default: dd.textContent = "N/A";
                }
            })
        })
        .catch(error => {
            console.error('Error fetching order states:', error);
        });
}

displayNotifications();
displayNotificationCount();
updateOrderStates();
setInterval(() => {
    displayNotifications();
    displayNotificationCount();
    console.log("Displaying notifications.");
    updateOrderStates();
    console.log("Updating order states");
}, 5000);