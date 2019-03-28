

warm_blooded(human).
warm_blooded(penguine).

produce_milk(human).
produce_milk(penguine).

father(William,Ramsey).
father(William,Gilton).
brother(Y,X) :- father(William,X),father(William,Y),not(Y=X).

have_fur(human).
have_feathers(penguine).

mammal(X) :- warm_blooded(X),have_fur(X),produce_milk(X).

start:-write('please tell me yor name '),
read(X),
write('Hello your age is 20',
write(X).