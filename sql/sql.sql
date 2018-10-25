/*sql statement to add new User into database*/
insert into Users (MacAddr, Standort, Pw) Values("b827ebead783","Neuhausen","B4ck4tIt4g4in");


/*code to create the tables we use*/
Create Table Users(
	ID int NOT NULL AUTO_INCREMENT,
	MacAddr varchar(255) not null,
    Standort varchar(255) not null,
    Pw varchar(255) not null,
    primary key(ID)
);

Create Table Readings(
	ID int NOT NULL AUTO_INCREMENT,
	Datum datetime default now(),
    Temperature float not null,
    AirPressure int not null,
    AirQuality int not null,
    WaterSaturation float not null,
    UserID int not null,
    foreign key(UserID) references Users(ID),
    PRIMARY KEY (ID)
);
