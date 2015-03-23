CREATE TABLE Yllapitaja(
  id SERIAL PRIMARY KEY,
  name varchar(50) NOT NULL,
  password varchar(50) NOT NULL
);

CREATE TABLE Kayttaja(
  id SERIAL PRIMARY KEY,
  name varchar(50) NOT NULL,
  age date NOT NULL
);

CREATE TABLE RaakaAine(
  id SERIAL PRIMARY KEY,
  name varchar(50) NOT NULL,
  selitys text
);

CREATE TABLE Lasityyppi(
  id SERIAL PRIMARY KEY,
  name varchar(50) NOT NULL,
  lkuvaus text
);

CREATE TABLE Juomatyyppi(
  id SERIAL PRIMARY KEY,
  name varchar(50) NOT NULL,
  jkuvaus text
);

CREATE TABLE Drinkkiohje(
  id SERIAL PRIMARY KEY,
  ktunnus INTEGER REFERENCES Kayttaja(id), 
  ytunnus INTEGER REFERENCES Yllapitaja(id),
  raine INTEGER REFERENCES RaakaAine(id),
  jtyyppi INTEGER REFERENCES Juomatyyppi(id),
  ltyyppi INTEGER REFERENCES Lasityyppi(id),
  name varchar(50) NOT NULL,
  lpva DATE,
  vohje TEXT NOT NULL 
);
