CREATE TABLE albums (
id int not null primary key auto_increment,
inserttime datetime,
albumtitle varchar(255),
albumartist varchar(255),
albumlength int,
status varchar(255),
url varchar(255)
);

INSERT INTO album (inserttime, albumtitle, albumartist, albumlength, url)
VALUES (CURTIME(),"Blurryface","twenty one pilots",52,"https://www.amazon.com/Blurryface-Twenty-One-Pilots/dp/B00VI2L3L4"),
	   (CURTIME(),"Alive or Just Breathing","Killswitch Engage",44,"https://www.amazon.com/Alive-Just-Breathing-KILLSWITCH-ENGAGE/dp/B000065894/ref=sr_1_1?crid=1DYV3ZATL0K11&keywords=alive+or+just+breathing&qid=1556123422&s=music&sprefix=alive+or+%2Cpopular%2C160&sr=1-1-catcorr"),
       (CURTIME(),"The Click","AJR",48,"https://www.amazon.com/Click-AJR/dp/B06ZXRZRJQ/ref=sr_1_1?keywords=the+click+ajr&qid=1556123440&s=music&sr=1-1-catcorr"),
       (CURTIME(),"The Life Of Pablo","Kanye West",66,"https://www.amazon.com/Yeezus-Explicit-Kanye-West/dp/B00CV5ZPA2/ref=sr_1_1?crid=3AIACODUF8JB6&keywords=the+life+of+pablo+cd&qid=1556123457&s=music&sprefix=the+life+of+p%2Cpopular%2C160&sr=1-1"),
       (CURTIME(),"Abbey Road","The Beatles",47,"https://www.amazon.com/Abbey-Road-Beatles/dp/B0025KVLUQ/ref=sr_1_3?crid=18CZFCLOZU615&keywords=abbey+road&qid=1556123501&s=music&sprefix=abbey%2Cpopular%2C156&sr=1-3"),
	   (CURTIME(),"Vessel","twenty one pilots",45,"https://www.amazon.com/Vessel-Clear-Colored-Digital-Download/dp/B00JMBQE76/ref=sr_1_1?keywords=vessel&qid=1556123521&s=music&sr=1-1"),
	   (CURTIME(),"Incarnate","Killswitch Engage",43,"https://www.amazon.com/Incarnate-Vinyl-w-Digital-Download/dp/B01EKMI6X6/ref=sr_1_1?keywords=incarnate&qid=1556123556&s=music&sr=1-1"),
       (CURTIME(),"Bad Brains","Bad Brains",33,"https://www.amazon.com/Bad-Brains/dp/B000001Q3T/ref=sr_1_1?keywords=bad+brains&qid=1556123571&s=music&sr=1-1"),
       (CURTIME(),"Swordfishtrombones","Tom Waits",40,"https://www.amazon.com/Swordfishtrombones-Tom-Waits/dp/B000W237SS/ref=sr_1_1?keywords=swordfishtrombones&qid=1556123589&s=gateway&sr=8-1"),
       (CURTIME(),"Anthem of the Peaceful Army","Greta Van Fleet",45,"https://www.amazon.com/Greta-Van-Fleet-Peaceful-Translucent/dp/B07L45MRHJ/ref=sr_1_1_sspa?crid=12LAWTUDY7JHE&keywords=anthem+of+the+peaceful+army&qid=1556123608&s=gateway&sprefix=anthem+of+the+%2Caps%2C172&sr=8-1-spons&psc=1&smid=A3PUK6M38M0R9N");