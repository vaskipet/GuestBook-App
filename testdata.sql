/* Inserting test data into the created tables */


INSERT INTO `comments`(cid, uid, date, message)
  values (100, 100, 2017-12-12, 'testmessage');

INSERT INTO `user`(id, first, last, uid, pwd)
  values(100, 'test' , 'person', 'testperson', 'test');