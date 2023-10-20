# php
# db-session
Caratteristiche:
Login e Registrazione: Gli utenti possono registrarsi come navigatori e, successivamente, effettuare l'accesso utilizzando email e password.

Accesso Amministratore: Gli utenti hanno la possibilità di accedere come amministratori inserendo una seconda password durante la fase di login. L'accesso come amministratore offre privilegi avanzati, permettendo una gestione più dettagliata del sistema.

Visualizzazione Utenti: Una volta autenticato come amministratore, è possibile visualizzare un elenco di tutti gli utenti registrati, con dettagli come nome, cognome ed email.

Sicurezza: L'applicazione implementa misure di sicurezza, come l'uso di sessioni e la gestione separata delle credenziali di connessione al database per navigatori e amministratori.

Tecnologie Utilizzate:
Linguaggio: PHP
Database: MySQL

+----+------------+-----------+----------------------------------+----------+
| id | nome       | cognome   | email                            | password |
+----+------------+-----------+----------------------------------+----------+
| 31 | 
| 32 |  
| 35 |    
| 37 | 
+----+
+---------+---------------+
| user_id | root_password |
+---------+---------------+
|      31 |               |
|      35 |               |
+---------+---------------+
+----------+--------------+------+-----+---------+----------------+
| Field    | Type         | Null | Key | Default | Extra          |
+----------+--------------+------+-----+---------+----------------+
| id       | int(11)      | NO   | PRI | NULL    | auto_increment |
| nome     | varchar(255) | NO   |     | NULL    |                |
| cognome  | varchar(255) | NO   |     | NULL    |                |
| email    | varchar(255) | NO   | UNI | NULL    |                |
| password | varchar(255) | NO   |     | NULL    |                |
+----------+--------------+------+-----+---------+----------------+
+---------------+--------------+------+-----+---------+-------+
| Field         | Type         | Null | Key | Default | Extra |
+---------------+--------------+------+-----+---------+-------+
| user_id       | int(11)      | NO   | PRI | NULL    |       |
| root_password | varchar(255) | NO   |     | NULL    |       |
+---------------+--------------+------+-----+---------+-------+


mysql> select * from utenti;
+----+------------+-----------+----------------------------------+----------+------+
| id | nome       | cognome   | email                            | password | data |
+----+------------+-----------+----------------------------------+----------+------+
| 31 | alessandro | tornabene | alessandro.tornabene78@gmail.com | tmax2011 | NULL |
| 32 | Alessandro | Tornabene | alessandro.tornabene@gmail.com   | tmax2011 | NULL |
| 35 | Ale        | Torna     | ale@gmail.com                    | pippo    | NULL |
| 37 | alessandro | tornabene | alessandro@gmail.com             | 12345    | NULL |
| 38 | matilde    | tornabene | matilde.tornabene@gmail.com      | tmax2011 | NULL |
| 40 | francesca  | addonizio | francesca.addonizio@gmail.com    | tmax2011 | NULL |
+----+------------+-----------+----------------------------------+----------+------+
6 rows in set (0,01 sec)

mysql> alter table ALTER TABLE utenti MODIFY COLUMN data DATE DEFAULT '2000-01-01';
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ALTER TABLE utenti MODIFY COLUMN data DATE DEFAULT '2000-01-01'' at line 1
mysql> ALTER TABLE utenti MODIFY COLUMN data DATE DEFAULT '2000-01-01';
Query OK, 0 rows affected (0,02 sec)
Records: 0  Duplicates: 0  Warnings: 0

mysql> select * from utenti;
+----+------------+-----------+----------------------------------+----------+------+
| id | nome       | cognome   | email                            | password | data |
+----+------------+-----------+----------------------------------+----------+------+
| 31 | alessandro | tornabene | alessandro.tornabene78@gmail.com | tmax2011 | NULL |
| 32 | Alessandro | Tornabene | alessandro.tornabene@gmail.com   | tmax2011 | NULL |
| 35 | Ale        | Torna     | ale@gmail.com                    | pippo    | NULL |
| 37 | alessandro | tornabene | alessandro@gmail.com             | 12345    | NULL |
| 38 | matilde    | tornabene | matilde.tornabene@gmail.com      | tmax2011 | NULL |
| 40 | francesca  | addonizio | francesca.addonizio@gmail.com    | tmax2011 | NULL |
+----+------------+-----------+----------------------------------+----------+------+
6 rows in set (0,01 sec)

mysql> describe utenti;
+----------+--------------+------+-----+------------+----------------+
| Field    | Type         | Null | Key | Default    | Extra          |
+----------+--------------+------+-----+------------+----------------+
| id       | int(11)      | NO   | PRI | NULL       | auto_increment |
| nome     | varchar(255) | NO   |     | NULL       |                |
| cognome  | varchar(255) | NO   |     | NULL       |                |
| email    | varchar(255) | NO   | UNI | NULL       |                |
| password | varchar(255) | NO   |     | NULL       |                |
| data     | date         | YES  |     | 2000-01-01 |                |
+----------+--------------+------+-----+------------+----------------+
6 rows in set (0,02 sec)

mysql> select * from utenti;
+----+------------+-----------+----------------------------------+----------+------------+
| id | nome       | cognome   | email                            | password | data       |
+----+------------+-----------+----------------------------------+----------+------------+
| 31 | alessandro | tornabene | alessandro.tornabene78@gmail.com | tmax2011 | NULL       |
| 32 | Alessandro | Tornabene | alessandro.tornabene@gmail.com   | tmax2011 | NULL       |
| 35 | Ale        | Torna     | ale@gmail.com                    | pippo    | NULL       |
| 37 | alessandro | tornabene | alessandro@gmail.com             | 12345    | NULL       |
| 38 | matilde    | tornabene | matilde.tornabene@gmail.com      | tmax2011 | NULL       |
| 40 | francesca  | addonizio | francesca.addonizio@gmail.com    | tmax2011 | NULL       |
| 41 | paolo      | rossi     | paolo@gmail.com                  | tmax2011 | 2023-08-02 |
+----+------------+-----------+----------------------------------+----------+------------+
7 rows in set (0,05 sec)


mysql> UPDATE utenti 
    -> SET data = '2022-12-01' 
    -> WHERE id = 31;
Query OK, 1 row affected (0,04 sec)
Rows matched: 1  Changed: 1  Warnings: 0

mysql> UPDATE utenti  SET data = '2020-10-01'  WHERE id = 32;
Query OK, 1 row affected (0,02 sec)
Rows matched: 1  Changed: 1  Warnings: 0

mysql> update utenti set data = '2016-10-01' where id = 35;
Query OK, 1 row affected (0,01 sec)
Rows matched: 1  Changed: 1  Warnings: 0

mysql> select * from utenti;
+----+------------+-----------+----------------------------------+----------+------------+
| id | nome       | cognome   | email                            | password | data       |
+----+------------+-----------+----------------------------------+----------+------------+
| 31 | alessandro | tornabene | alessandro.tornabene78@gmail.com | tmax2011 | 2022-12-01 |
| 32 | Alessandro | Tornabene | alessandro.tornabene@gmail.com   | tmax2011 | 2020-10-01 |
| 35 | Ale        | Torna     | ale@gmail.com                    | pippo    | 2016-10-01 |
| 37 | alessandro | tornabene | alessandro@gmail.com             | 12345    | NULL       |
| 38 | matilde    | tornabene | matilde.tornabene@gmail.com      | tmax2011 | NULL       |
| 40 | francesca  | addonizio | francesca.addonizio@gmail.com    | tmax2011 | NULL       |
| 41 | paolo      | rossi     | paolo@gmail.com                  | tmax2011 | 2023-08-02 |
+----+------------+-----------+----------------------------------+----------+------------+
7 rows in set (0,02 sec)

mysql> ALTER TABLE utenti CHANGE data data_nascita DATE;
Query OK, 0 rows affected (0,02 sec)
Records: 0  Duplicates: 0  Warnings: 0

mysql> 
mysql> select * from utenti;
+----+------------+-----------+----------------------------------+----------+--------------+
| id | nome       | cognome   | email                            | password | data_nascita |
+----+------------+-----------+----------------------------------+----------+--------------+
| 31 | alessandro | tornabene | alessandro.tornabene78@gmail.com | tmax2011 | 2022-12-01   |
| 32 | Alessandro | Tornabene | alessandro.tornabene@gmail.com   | tmax2011 | 2020-10-01   |
| 35 | Ale        | Torna     | ale@gmail.com                    | pippo    | 2016-10-01   |
| 37 | alessandro | tornabene | alessandro@gmail.com             | 12345    | NULL         |
| 38 | matilde    | tornabene | matilde.tornabene@gmail.com      | tmax2011 | NULL         |
| 40 | francesca  | addonizio | francesca.addonizio@gmail.com    | tmax2011 | NULL         |
| 41 | paolo      | rossi     | paolo@gmail.com                  | tmax2011 | 2023-08-02   |
+----+------------+-----------+----------------------------------+----------+--------------+
7 rows in set (0,01 sec)

mysql> alter table utenti add  column data_iscrizione date;
Query OK, 0 rows affected (0,02 sec)
Records: 0  Duplicates: 0  Warnings: 0

mysql> select * from utenti;
+----+------------+-----------+----------------------------------+----------+--------------+-----------------+
| id | nome       | cognome   | email                            | password | data_nascita | data_iscrizione |
+----+------------+-----------+----------------------------------+----------+--------------+-----------------+
| 31 | alessandro | tornabene | alessandro.tornabene78@gmail.com | tmax2011 | 2022-12-01   | NULL            |
| 32 | Alessandro | Tornabene | alessandro.tornabene@gmail.com   | tmax2011 | 2020-10-01   | NULL            |
| 35 | Ale        | Torna     | ale@gmail.com                    | pippo    | 2016-10-01   | NULL            |
| 37 | alessandro | tornabene | alessandro@gmail.com             | 12345    | NULL         | NULL            |
| 38 | matilde    | tornabene | matilde.tornabene@gmail.com      | tmax2011 | NULL         | NULL            |
| 40 | francesca  | addonizio | francesca.addonizio@gmail.com    | tmax2011 | NULL         | NULL            |
| 41 | paolo      | rossi     | paolo@gmail.com                  | tmax2011 | 2023-08-02   | NULL            |
+----+------------+-----------+----------------------------------+----------+--------------+-----------------+
7 rows in set (0,01 sec)

mysql> select * from utenti;
+----+------------+-----------+----------------------------------+----------+--------------+-----------------+
| id | nome       | cognome   | email                            | password | data_nascita | data_iscrizione |
+----+------------+-----------+----------------------------------+----------+--------------+-----------------+
| 31 | alessandro | tornabene | alessandro.tornabene78@gmail.com | tmax2011 | 2022-12-01   | NULL            |
| 32 | Alessandro | Tornabene | alessandro.tornabene@gmail.com   | tmax2011 | 2020-10-01   | NULL            |
| 35 | Ale        | Torna     | ale@gmail.com                    | pippo    | 2016-10-01   | NULL            |
| 37 | alessandro | tornabene | alessandro@gmail.com             | 12345    | NULL         | NULL            |
| 38 | matilde    | tornabene | matilde.tornabene@gmail.com      | tmax2011 | NULL         | NULL            |
| 40 | francesca  | addonizio | francesca.addonizio@gmail.com    | tmax2011 | NULL         | NULL            |
| 41 | paolo      | rossi     | paolo@gmail.com                  | tmax2011 | 2023-08-02   | NULL            |
| 42 | ciccio     | pasticcio | ciccio@gmail.com                 | tmax2011 | 2012-12-23   | NULL            |
+----+------------+-----------+----------------------------------+----------+--------------+-----------------+
8 rows in set (0,02 sec)

mysql> select * from utenti;
+----+------------+-----------+----------------------------------+----------+--------------+-----------------+
| id | nome       | cognome   | email                            | password | data_nascita | data_iscrizione |
+----+------------+-----------+----------------------------------+----------+--------------+-----------------+
| 31 | alessandro | tornabene | alessandro.tornabene78@gmail.com | tmax2011 | 2022-12-01   | NULL            |
| 32 | Alessandro | Tornabene | alessandro.tornabene@gmail.com   | tmax2011 | 2020-10-01   | NULL            |
| 35 | Ale        | Torna     | ale@gmail.com                    | pippo    | 2016-10-01   | NULL            |
| 37 | alessandro | tornabene | alessandro@gmail.com             | 12345    | NULL         | NULL            |
| 38 | matilde    | tornabene | matilde.tornabene@gmail.com      | tmax2011 | NULL         | NULL            |
| 40 | francesca  | addonizio | francesca.addonizio@gmail.com    | tmax2011 | NULL         | NULL            |
| 41 | paolo      | rossi     | paolo@gmail.com                  | tmax2011 | 2023-08-02   | NULL            |
| 42 | ciccio     | pasticcio | ciccio@gmail.com                 | tmax2011 | 2012-12-23   | NULL            |
| 43 | pluto      | pluto     | pluto@gmail.com                  | tmax2011 | 2013-01-23   | 2023-10-17      |
+----+------------+-----------+----------------------------------+----------+--------------+-----------------+
9 rows in set (0,02 sec)

mysql> UPDATE utenti SET data_iscrizione = '2023-10-17';
Query OK, 8 rows affected (0,05 sec)
Rows matched: 9  Changed: 8  Warnings: 0

mysql> select * from utenti;
+----+------------+-----------+----------------------------------+----------+--------------+-----------------+
| id | nome       | cognome   | email                            | password | data_nascita | data_iscrizione |
+----+------------+-----------+----------------------------------+----------+--------------+-----------------+
| 31 | alessandro | tornabene | alessandro.tornabene78@gmail.com | tmax2011 | 2022-12-01   | 2023-10-17      |
| 32 | Alessandro | Tornabene | alessandro.tornabene@gmail.com   | tmax2011 | 2020-10-01   | 2023-10-17      |
| 35 | Ale        | Torna     | ale@gmail.com                    | pippo    | 2016-10-01   | 2023-10-17      |
| 37 | alessandro | tornabene | alessandro@gmail.com             | 12345    | NULL         | 2023-10-17      |
| 38 | matilde    | tornabene | matilde.tornabene@gmail.com      | tmax2011 | NULL         | 2023-10-17      |
| 40 | francesca  | addonizio | francesca.addonizio@gmail.com    | tmax2011 | NULL         | 2023-10-17      |
| 41 | paolo      | rossi     | paolo@gmail.com                  | tmax2011 | 2023-08-02   | 2023-10-17      |
| 42 | ciccio     | pasticcio | ciccio@gmail.com                 | tmax2011 | 2012-12-23   | 2023-10-17      |
| 43 | pluto      | pluto     | pluto@gmail.com                  | tmax2011 | 2013-01-23   | 2023-10-17      |
+----+------------+-----------+----------------------------------+----------+--------------+-----------------+
9 rows in set (0,02 sec)
mysql> SELECT data_iscrizione, COUNT(data_iscrizione) as num_iscrizioni
    -> FROM utenti
    -> GROUP BY data_iscrizione;
+-----------------+----------------+
| data_iscrizione | num_iscrizioni |
+-----------------+----------------+
| 2023-01-01      |              1 |
| 2023-01-02      |              1 |
| 2023-01-03      |              1 |
| 2023-01-04      |              1 |
| 2023-01-05      |              1 |
| 2023-01-06      |              1 |
| 2023-01-07      |              1 |
| 2023-01-08      |              1 |
| 2023-01-09      |              1 |
| 2023-01-10      |              1 |
| 2023-01-11      |              1 |
| 2023-01-12      |              1 |
| 2023-01-13      |              1 |
| 2023-01-14      |              1 |
| 2023-01-15      |              1 |
| 2023-01-16      |              1 |
| 2023-01-17      |              1 |
| 2023-01-18      |              1 |
| 2023-01-19      |              1 |
| 2023-01-20      |              1 |
| 2023-10-09      |              9 |
+-----------------+----------------+
21 rows in set (0,01 sec)

mysql> 
mysql> select * from utenti;
+----+------------+-----------+----------------------------------+----------------------+--------------+-----------------+---------------+
| id | nome       | cognome   | email                            | password             | data_nascita | data_iscrizione | citta         |
+----+------------+-----------+----------------------------------+----------------------+--------------+-----------------+---------------+
| 31 | alessandro | tornabene | alessandro.tornabene78@gmail.com | tmax2011             | 2022-12-01   | 2023-10-09      | Roma          |
| 32 | Alessandro | Tornabene | alessandro.tornabene@gmail.com   | tmax2011             | 2020-10-01   | 2023-10-09      | Milano        |
| 35 | Ale        | Torna     | ale@gmail.com                    | pippo                | 2016-10-01   | 2023-10-09      | Napoli        |
| 37 | alessandro | tornabene | alessandro@gmail.com             | 12345                | 2016-10-01   | 2023-10-09      | Torino        |
| 38 | matilde    | tornabene | matilde.tornabene@gmail.com      | tmax2011             | 2015-10-28   | 2023-10-09      | Palermo       |
| 40 | francesca  | addonizio | francesca.addonizio@gmail.com    | tmax2011             | 2016-10-01   | 2023-10-09      | Genova        |
| 41 | paolo      | rossi     | paolo@gmail.com                  | tmax2011             | 2023-08-02   | 2023-10-09      | Bologna       |
| 42 | ciccio     | pasticcio | ciccio@gmail.com                 | tmax2011             | 2012-12-23   | 2023-10-09      | Firenze       |
| 43 | pluto      | pluto     | pluto@gmail.com                  | tmax2011             | 2013-01-23   | 2023-10-09      | Cagliari      |
| 44 | Mario      | Rossi     | mario.rossi@example.com          | passwordMario123     | 1985-01-01   | 2023-01-01      | Venezia       |
| 45 | Luca       | Bianchi   | luca.bianchi@example.com         | passwordLuca123      | 1987-02-01   | 2023-01-02      | Verona        |
| 46 | Anna       | Verdi     | anna.verdi@example.com           | passwordAnna123      | 1986-03-15   | 2023-01-03      | Parma         |
| 47 | Giulia     | Neri      | giulia.neri@example.com          | passwordGiulia123    | 1988-04-20   | 2023-01-04      | Padova        |
| 48 | Francesco  | Marrone   | francesco.marrone@example.com    | passwordFrancesco123 | 1983-05-05   | 2023-01-05      | Trieste       |
| 49 | Chiara     | Giallo    | chiara.giallo@example.com        | passwordChiara123    | 1992-06-30   | 2023-01-06      | Bari          |
| 50 | Roberto    | Viola     | roberto.viola@example.com        | passwordRoberto123   | 1978-07-07   | 2023-01-07      | Taranto       |
| 51 | Elena      | Azzurro   | elena.azzurro@example.com        | passwordElena123     | 1991-08-15   | 2023-01-08      | Perugia       |
| 52 | Davide     | Celeste   | davide.celeste@example.com       | passwordDavide123    | 1990-09-25   | 2023-01-09      | Trento        |
| 53 | Federica   | Arancione | federica.arancione@example.com   | passwordFederica123  | 1984-10-31   | 2023-01-10      | Novara        |
| 54 | Antonio    | Rosso     | antonio.rosso@example.com        | passwordAntonio123   | 1982-11-12   | 2023-01-11      | Ancona        |
| 55 | Sara       | Verde     | sara.verde@example.com           | passwordSara123      | 1989-12-01   | 2023-01-12      | Lecce         |
| 56 | Stefano    | Blu       | stefano.blu@example.com          | passwordStefano123   | 1981-02-20   | 2023-01-13      | Catania       |
| 57 | Valeria    | Rosa      | valeria.rosa@example.com         | passwordValeria123   | 1993-03-28   | 2023-01-14      | Messina       |
| 58 | Matteo     | Grigio    | matteo.grigio@example.com        | passwordMatteo123    | 1980-04-04   | 2023-01-15      | Pescara       |
| 59 | Eleonora   | Magenta   | eleonora.magenta@example.com     | passwordEleonora123  | 1994-05-15   | 2023-01-16      | Agrigento     |
| 60 | Alessio    | Turchese  | alessio.turchese@example.com     | passwordAlessio123   | 1986-06-06   | 2023-01-17      | Trapani       |
| 61 | Beatrice   | Oro       | beatrice.oro@example.com         | passwordBeatrice123  | 1995-07-17   | 2023-01-18      | Caserta       |
| 62 | Fabio      | Argento   | fabio.argento@example.com        | passwordFabio123     | 1983-08-24   | 2023-01-19      | Brindisi      |
| 63 | Paola      | Bronzo    | paola.bronzo@example.com         | passwordPaola123     | 1992-09-03   | 2023-01-20      | Reggio Emilia |
+----+------------+-----------+----------------------------------+----------------------+--------------+-----------------+---------------+
29 rows in set (0,02 sec)
+-----------------+--------------+------+-----+-------------+----------------+
| Field           | Type         | Null | Key | Default     | Extra          |
+-----------------+--------------+------+-----+-------------+----------------+
| id              | int(11)      | NO   | PRI | NULL        | auto_increment |
| nome            | varchar(255) | NO   |     | NULL        |                |
| cognome         | varchar(255) | NO   |     | NULL        |                |
| email           | varchar(255) | NO   | UNI | NULL        |                |
| password        | varchar(255) | NO   |     | NULL        |                |
| data_nascita    | date         | YES  |     | NULL        |                |
| data_iscrizione | date         | YES  |     | NULL        |                |
| citta           | varchar(255) | NO   |     | Sconosciuto |                |
+-----------------+--------------+------+-----+-------------+----------------+
8 rows in set (0,01 sec)

mysql> 
mysql> INSERT INTO data_iscrizione (id, data_iscrizione)
    -> SELECT id, data_iscrizione FROM utenti;
Query OK, 29 rows affected (0,02 sec)
Records: 29  Duplicates: 0  Warnings: 0

mysql> ALTER TABLE utenti DROP COLUMN data_iscrizione;
Query OK, 0 rows affected (0,04 sec)
Records: 0  Duplicates: 0  Warnings: 0

mysql> select * from utenti;
+----+------------+-----------+----------------------------------+----------------------+--------------+---------------+
| id | nome       | cognome   | email                            | password             | data_nascita | citta         |
+----+------------+-----------+----------------------------------+----------------------+--------------+---------------+
| 31 | alessandro | tornabene | alessandro.tornabene78@gmail.com | tmax2011             | 2022-12-01   | Roma          |
| 32 | Alessandro | Tornabene | alessandro.tornabene@gmail.com   | tmax2011             | 2020-10-01   | Milano        |
| 35 | Ale        | Torna     | ale@gmail.com                    | pippo                | 2016-10-01   | Napoli        |
| 37 | alessandro | tornabene | alessandro@gmail.com             | 12345                | 2016-10-01   | Torino        |
| 38 | matilde    | tornabene | matilde.tornabene@gmail.com      | tmax2011             | 2015-10-28   | Palermo       |
| 40 | francesca  | addonizio | francesca.addonizio@gmail.com    | tmax2011             | 2016-10-01   | Genova        |
| 41 | paolo      | rossi     | paolo@gmail.com                  | tmax2011             | 2023-08-02   | Bologna       |
| 42 | ciccio     | pasticcio | ciccio@gmail.com                 | tmax2011             | 2012-12-23   | Firenze       |
| 43 | pluto      | pluto     | pluto@gmail.com                  | tmax2011             | 2013-01-23   | Cagliari      |
| 44 | Mario      | Rossi     | mario.rossi@example.com          | passwordMario123     | 1985-01-01   | Venezia       |
| 45 | Luca       | Bianchi   | luca.bianchi@example.com         | passwordLuca123      | 1987-02-01   | Verona        |
| 46 | Anna       | Verdi     | anna.verdi@example.com           | passwordAnna123      | 1986-03-15   | Parma         |
| 47 | Giulia     | Neri      | giulia.neri@example.com          | passwordGiulia123    | 1988-04-20   | Padova        |
| 48 | Francesco  | Marrone   | francesco.marrone@example.com    | passwordFrancesco123 | 1983-05-05   | Trieste       |
| 49 | Chiara     | Giallo    | chiara.giallo@example.com        | passwordChiara123    | 1992-06-30   | Bari          |
| 50 | Roberto    | Viola     | roberto.viola@example.com        | passwordRoberto123   | 1978-07-07   | Taranto       |
| 51 | Elena      | Azzurro   | elena.azzurro@example.com        | passwordElena123     | 1991-08-15   | Perugia       |
| 52 | Davide     | Celeste   | davide.celeste@example.com       | passwordDavide123    | 1990-09-25   | Trento        |
| 53 | Federica   | Arancione | federica.arancione@example.com   | passwordFederica123  | 1984-10-31   | Novara        |
| 54 | Antonio    | Rosso     | antonio.rosso@example.com        | passwordAntonio123   | 1982-11-12   | Ancona        |
| 55 | Sara       | Verde     | sara.verde@example.com           | passwordSara123      | 1989-12-01   | Lecce         |
| 56 | Stefano    | Blu       | stefano.blu@example.com          | passwordStefano123   | 1981-02-20   | Catania       |
| 57 | Valeria    | Rosa      | valeria.rosa@example.com         | passwordValeria123   | 1993-03-28   | Messina       |
| 58 | Matteo     | Grigio    | matteo.grigio@example.com        | passwordMatteo123    | 1980-04-04   | Pescara       |
| 59 | Eleonora   | Magenta   | eleonora.magenta@example.com     | passwordEleonora123  | 1994-05-15   | Agrigento     |
| 60 | Alessio    | Turchese  | alessio.turchese@example.com     | passwordAlessio123   | 1986-06-06   | Trapani       |
| 61 | Beatrice   | Oro       | beatrice.oro@example.com         | passwordBeatrice123  | 1995-07-17   | Caserta       |
| 62 | Fabio      | Argento   | fabio.argento@example.com        | passwordFabio123     | 1983-08-24   | Brindisi      |
| 63 | Paola      | Bronzo    | paola.bronzo@example.com         | passwordPaola123     | 1992-09-03   | Reggio Emilia |
+----+------------+-----------+----------------------------------+----------------------+--------------+---------------+
29 rows in set (0,02 sec)

mysql> select * from data_iscrizine;
ERROR 1146 (42S02): Table 'php.data_iscrizine' doesn't exist
mysql> select * from data_iscrizione;
+----+-----------------+
| id | data_iscrizione |
+----+-----------------+
| 31 | 2023-10-09      |
| 32 | 2023-10-09      |
| 35 | 2023-10-09      |
| 37 | 2023-10-09      |
| 38 | 2023-10-09      |
| 40 | 2023-10-09      |
| 41 | 2023-10-09      |
| 42 | 2023-10-09      |
| 43 | 2023-10-09      |
| 44 | 2023-01-01      |
| 45 | 2023-01-02      |
| 46 | 2023-01-03      |
| 47 | 2023-01-04      |
| 48 | 2023-01-05      |
| 49 | 2023-01-06      |
| 50 | 2023-01-07      |
| 51 | 2023-01-08      |
| 52 | 2023-01-09      |
| 53 | 2023-01-10      |
| 54 | 2023-01-11      |
| 55 | 2023-01-12      |
| 56 | 2023-01-13      |
| 57 | 2023-01-14      |
| 58 | 2023-01-15      |
| 59 | 2023-01-16      |
| 60 | 2023-01-17      |
| 61 | 2023-01-18      |
| 62 | 2023-01-19      |
| 63 | 2023-01-20      |
+----+-----------------+
29 rows in set (0,02 sec)
mysql> SELECT data_iscrizione, COUNT(id) as numero_utenti
    -> FROM data_iscrizione
    -> GROUP BY data_iscrizione
    -> ORDER BY data_iscrizione;
+-----------------+---------------+
| data_iscrizione | numero_utenti |
+-----------------+---------------+
| 2023-01-01      |             1 |
| 2023-01-02      |             1 |
| 2023-01-03      |             1 |
| 2023-01-04      |             1 |
| 2023-01-05      |             1 |
| 2023-01-06      |             1 |
| 2023-01-07      |             1 |
| 2023-01-08      |             1 |
| 2023-01-09      |             1 |
| 2023-01-10      |             1 |
| 2023-01-11      |             1 |
| 2023-01-12      |             1 |
| 2023-01-13      |             1 |
| 2023-01-14      |             1 |
| 2023-01-15      |             1 |
| 2023-01-16      |             1 |
| 2023-01-17      |             1 |
| 2023-01-18      |             1 |
| 2023-01-19      |             1 |
| 2023-01-20      |             1 |
| 2023-10-09      |             9 |
+-----------------+---------------+
21 rows in set (0,04 sec)

mysql> 
