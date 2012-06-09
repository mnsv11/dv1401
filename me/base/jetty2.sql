DROP TABLE IF EXISTS "jetty";
CREATE TABLE "jetty" ("position" INTEGER PRIMARY KEY  NOT NULL ,"boatType" VARCHAR(20),"engine" VARCHAR(20),"length" INTEGER,"width" INTEGER,"owner" VARCHAR(20));
INSERT INTO "jetty" VALUES(1,'Buster XXL','Yamaha 115hk',635,240,'Adam');
INSERT INTO "jetty" VALUES(2,'Buster M','Yamaha 40hk',460,186,'Berit');
INSERT INTO "jetty" VALUES(3,'Linder','Tohatsu 4hk',431,164,'Ceasar');
