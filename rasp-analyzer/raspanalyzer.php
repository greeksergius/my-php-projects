<?php
		
		try {	
			$host = 'localhost';
			$db   = 'wordpress';
			$user = 'wordpress';
			$pass = '12345';
			$charset = 'utf8';
			$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
			$opt = [
					PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
					PDO::ATTR_EMULATE_PREPARES   => false,
				   ];
			$dbh = new PDO($dsn, $user, $pass, $opt);
		} 
		
		 catch (PDOException $e) 
								{
								die($e->getMessage());
								}		


$DataArray = simplexml_load_file('rasp.xml');

 

foreach ($DataArray->Dataz as $rowcurent) {
//echo "<br>Дата:".$DataArray->Dataz->DataZan;
                                          $sthrasp = $dbh->prepare("SELECT datelectionsql FROM `rasptable` WHERE datelectionsql = ? LIMIT 1"); // если существует такой день, то далее сверяем на изменения
                                          $sthrasp->execute(array($rowcurent->DataZan));
                                          $truedata = $sthrasp->fetch(PDO::FETCH_ASSOC); 
                                          if ($truedata > 0) {
                                                               foreach ($rowcurent->Group as $rowcurentlevel2) {                                                                                                        
                                                                                                                foreach ($rowcurentlevel2->NomerPari as $rowcurentlevel3) {
                                                                                                                                                                               $sthrasp = $dbh->prepare("SELECT * FROM `rasptable` WHERE groupsql = ? AND  numberlectionsql = ? AND namelectionsql = ? AND timelectionsql = ? AND audsql = ? AND datelectionsql = ?"); // Запрос на пересчет кол-ва видов отметок
                                                                                                                                                                               $sthrasp->execute(array($rowcurentlevel2->Group, $rowcurentlevel3->NomerPari,  $rowcurentlevel3->Predmet, $rowcurentlevel3->TimePari, $rowcurentlevel3->Kabinet, $rowcurent->DataZan));
                                                                                                                                                                               $rasptotal = $sthrasp->fetch(PDO::FETCH_ASSOC); 
                                                                                                                                                                               if ($rasptotal == 0)   {
                                                                                                                                                                                                           echo "Изменения в расписании:";
                                                                                                                                                                                                           echo "\n";
                                                                                                                                                                                                           
                                                                                                                                                                                                           echo $rowcurentlevel2->Group." - ".$rowcurentlevel3->NomerPari." - ".$rowcurentlevel3->Predmet." - ".$rowcurentlevel3->TimePari." - ".$rowcurentlevel3->Kabinet." - ".$rowcurent->DataZan;
                                                                                                                                                                                                           echo "\n";
                                                                                                                                                                                                           // Вносим в отдельную таблицу изменения расписания для инфомессаджев
                                                                                                                                                                                                           $stmt = $dbh->prepare("INSERT INTO rasptable_changes (groupsql, datelectionsql, numberlectionsql, timelectionsql, namelectionsql, fioprepodsql, audsql) VALUES (:group, :datazan, :nomerpari, :timepari, :predmet, :prepod,:kabinet)");
                                                                                                                                                                                                           $stmt->bindParam(':group', $rowcurentlevel2->Group); // Группа
                                                                                                                                                                                                           $stmt->bindParam(':datazan', $rowcurent->DataZan); // дата занятия
                                                                                                                                                                                                           $stmt->bindParam(':nomerpari', $rowcurentlevel3->NomerPari); // номер пары
                                                                                                                                                                                                           $stmt->bindParam(':timepari', $rowcurentlevel3->TimePari); // время пары
                                                                                                                                                                                                           $stmt->bindParam(':predmet', $rowcurentlevel3->Predmet); // предмет
                                                                                                                                                                                                           $stmt->bindParam(':prepod', $rowcurentlevel3->Prepod); // преподаватель
                                                                                                                                                                                                           $stmt->bindParam(':kabinet', $rowcurentlevel3->Kabinet); // кабинет
                                                                                                                                                                                                           
                                                                                                                                                                                                           if (!$stmt->execute())  {
                                                                                                                                                                                                                                     //$info = $stmt->errorInfo(); // выводим наличие PDO ошибок если есть
                                                                                                                                                                                                                                     //   $info = 'Ошибка при операции обновления данных';
                                                                                                                                                                                                                                     //   echo 'Ошибка при операции обновления данных - '.$stmt->errorInfo();
                                                                                                                                                                                                                                   } 
                                                                                                                                                                                                           else {  
                                                                                                                                                                                                                  echo "<br> Внесение пары. Запись-";
                                                                                                                                                                                                                }
                                                                                                                                                                                                           
                                                                                                                                                                                                           }
                                                                                                                                                                                                                              
                                                                                                                                                                                                                                                            
                                                                                                                                                                        }
                                                                                                                  }

                                                               }
                                          //  else {  
                                          //       // Если таких дней не существует, то добавляем в расписание
                                          //       // десь необходимо повторить циклы с вложениями как выше.                                           
                                          //          echo "this new date and lection:";
                                          //          echo "\n";
                                                  
                                          //          echo $rowcurent->DataZan."\n";
                                          //       }
                                           }
                                         

     