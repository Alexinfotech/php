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
