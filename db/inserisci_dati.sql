INSERT INTO `utente` (`utenteID`, `nome`, `cognome`, `email`, `password`, `tipo`) VALUES
('1', 'azael', 'garcia', 'azaelgarcia@ex.com', 'prova123', '1'),
('2', 'leonardo', 'grimaldi', 'leonardogrimaldi@ex.com', 'prova123', '1'),
('3', 'marco', 'rossi', 'marcorossi@ex.com', 'password123', '0');

INSERT INTO `categoria` (`categoriaID`, `nome`, `descrizione`) VALUES 
(1, 'Fidget', 'Dedicata a strumenti interattivi e pratici che aiutano a scaricare la tensione e migliorare la concentrazione. Questi oggetti sono ideali per chi ha bisogno di mantenere le mani occupate per rilassarsi'),
(2, 'Gommosi', 'Si tratta di prodotti morbidi e deformabili che si adattano perfettamente a chi desidera scaricare lo stress attraverso il tatto. Questi oggetti sono ideali per stringere, schiacciare e rilassarsi'),
(3, 'Cubi', 'Pensati per gli amanti della geometria e dei rompicapo. Ogni prodotto offre una combinazione di intrattenimento, sfida e rilassamento mentale');

INSERT INTO `prodotto` (`prodottoID`, `nome`, `descrizione`, `prezzo`, `immagine`, `categoriaID`) VALUES
(1, 'Fidget Pad', 'Un piccolo dispositivo con pulsanti, leve e rotelle, progettato per fornire un’esperienza tattile coinvolgente. Perfetto per alleviare lo stress durante lunghe sessioni di lavoro o studio.', 8.0, 'fidget_pad.jpg', 1),
(2, 'Fidget Pen', 'Una penna funzionale che include meccanismi fidget integrati, come interruttori, clicker e rotelle. Ideale per studenti e professionisti multitasking.', 6.0, 'fidget_pen.jpg', 1),
(3, 'Fidget Ring', 'Un piccolo dispositivo con pulsanti, leve e rotelle, progettato per fornire un esperienza tattile coinvolgente. Perfetto per alleviare lo stress durante lunghe sessioni di lavoro o studio.', 19.0, 'fidget_ring.jpg', 1),
(4, 'Fidget Pop It', 'Un piccolo dispositivo con pulsanti, leve e rotelle, progettato per fornire un esperienza tattile coinvolgente. Perfetto per alleviare lo stress durante lunghe sessioni di lavoro o studio.', 12.0, 'fidget_popit.jpg', 1),
(5, 'Fidget Spinner', 'L’iconico oggetto rotante che aiuta a concentrare l’attenzione e ridurre l’ansia. Disponibile in diversi colori e stili.', 15.0, 'spinner.jpg', 1),
(6, 'Squishy Ball', 'Una palla morbida e compressibile, perfetta per essere schiacciata e manipolata. Aiuta a migliorare la circolazione e a rilassare la mente.', 12.0, 'squishy_ball.jpg', 2),
(7, 'Squishy Brain', 'Una replica in gomma morbida di un cervello. Divertente ed educativo, perfetto per chi cerca un antistress con un tocco di originalità', 10.0, 'squishy_brain.jpg', 2),
(8, 'Squishy Heart', 'Un cuore gommoso e comprimibile, simbolo di rilassamento ed emozioni positive. Ideale come regalo o come oggetto personale.', 9.0, 'squishy_heart.jpg', 2),
(9, 'Squishy Bread', 'Una soffice riproduzione di una fetta di pane o panino. Il suo aspetto realistico e la consistenza irresistibile la rendono un prodotto molto popolare.', 9.0, 'squishy_bread.jpg', 2),
(10, 'Cube', 'Un cubo semplice ma stimolante, progettato per essere manipolato e ruotato in vari modi. Ideale per scaricare lo stress in modo intuitivo.', 15.0, 'cube.jpg', 3),
(11, 'Cube Rubik', ' Il classico rompicapo a colori. Sfida la tua mente risolvendo questo celebre puzzle, mentre tieni le mani occupate.', 18.0, 'cube_rubik.jpg', 3),
(12, 'Cube Buzz', 'Un cubo con luci e suoni interattivi. Perfetto per chi ama gli stimoli multisensoriali e vuole un’esperienza più vivace.', 20.0, 'cube_buzz.jpg', 3),
(13, 'Cube Infinity', 'Un cubo pieghevole che si trasforma continuamente in diverse forme. Un oggetto affascinante che cattura l’attenzione e rilassa la mente.', 25.0, 'cube_infinity.jpg', 3);