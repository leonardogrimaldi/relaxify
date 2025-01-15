INSERT INTO `categoria` (`categoriaID`, `nome`, `descrizione`) VALUES (NULL, 'Cubi', 'I cubi antistress, conosciuti anche come fidget cubes, sono piccoli oggetti progettati per aiutare le persone a ridurre lo stress e migliorare la concentrazione.');

INSERT INTO `admin` (`adminID`, `email`, `password`) VALUES ('1', 'Azael@gmail.com', PASSWORD('admin')), ('2', 'leonardo@gmail.com', PASSWORD('admin'));

INSERT INTO `utente` (`utenteID`, `nome`, `cognome`, `email`, `password`, `tipo`) VALUES
('1', 'azael', 'garcia', 'azaelgarcia@ex.com', 'prova123', '1'),
('2', 'leonardo', 'grimaldi', 'leonardogrimaldi@ex.com', 'prova123', '1'),
('3', 'marco', 'rossi', 'marcorossi@ex.com', 'password123', '0');
