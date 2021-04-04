use ldst004;

insert into usuarios values
	("laura12","Gato12",1,"Laura","Fernandez Gonzalez", "laufer@hotmail.com", "652314695", "Calle Nueva, 11 - 3C" , "Badajoz"),
	("javi92","Perro72",1,"Javier","Moro Quiroga", "javmor@yahoo.es", "983265798", "Avda Segovia, 1 - 2A" , "Valladolid"),
	("Helen12","Pajaro152",1,"Elena","Perez Recio", "eleper@terra.es", "642359871", "Calle Candelaria, 18 - 4I" , "Avila"),
	("deivid12","Pez802",1,"David","de Anta Matamoros", "davant@hotmail.com", "912357489", "Calle Regalado, 3 - 6D" , "Guadalajara"),
	("administrador","Admin12",2,"Dani","Bueno Pacheco", "dani@gmail.com", "912357489", "Calle Azana, 3 - 6D" , "Valladolid");
	
insert into pedidos values
	(NULL, "laura12", 500.98, "2012-10-02 16:01:57"),
	(NULL, "javi92", 100.99, "2012-10-15 20:40:07"),
	(NULL, "Helen12", 170.50, "2012-11-01 10:25:09"),
	(NULL, "administrador", 260.00, "2012-11-21 13:54:14");

insert into animales values
	(NULL,"Pastor Aleman","perro","animal","/perros/PastorAleman.png",2,300),
	(NULL,"Akita Japones","perro","animal","/perros/akitajapones.png",2,200),
	(NULL,"Labrador","perro","animal","/perros/labrador.jpg",2,100),
	(NULL,"Perro Afgano","perro","animal","/perros/perroafgano.png",2,400),
	(NULL,"Doberman","perro","animal","/perros/doberman.png",2,500),
	(NULL,"Cachorro Bulldog","perro","animal","/perros/cachorrobulldog.png",2,350),
	(NULL,"Pienso cachorros","perro","alimentacion","/piensoperro/piensoCachorros.jpg",20,5),
	(NULL,"Leche maternizada","perro","alimentacion","/piensoperro/lecheMaternizada.jpg",20,3.95),
	(NULL,"Pienso Pedigree Mini","perro","alimentacion","/piensoperro/piensoPerroMini.jpg",20,6),
	(NULL,"Pienso Adulto Friskies","perro","alimentacion","/piensoperro/piensoPerroAdulto.jpg",20,9),
	(NULL,"Barritas Queso y Bacon","perro","alimentacion","/piensoperro/barraQuesoBacon.jpg",20,3.95),
	(NULL,"Trozos buey, pollo y verduras","perro","alimentacion","/piensoperro/piensolata.png",20,2.95),
	(NULL,"Golosinas sabor carne","perro","alimentacion","/piensoperro/golosinaCarne.jpg",20,4),
	(NULL,"Barritas sabor carne","perro","alimentacion","/piensoperro/barritasCarne.jpg",20,5.50),
	(NULL,"Cuenco de metal","perro","accesorio","/accesoriosperro/cuenco.jpg",20,3),
	(NULL,"Bebedero","perro","accesorio","/accesoriosperro/bebedero.jpg",20,5),
	(NULL,"Jaula de Transporte","perro","accesorio","/accesoriosperro/jaulaTrans.jpg",20,15),
	(NULL,"Caseta madera","perro","accesorio","/accesoriosperro/caseta.png",20,30),
	(NULL,"Collar de cuero","perro","accesorio","/accesoriosperro/collar.jpg",20,3.50),
	(NULL,"Correa","perro","accesorio","/accesoriosperro/correa.jpg",20,4.50),
	(NULL,"Pelota de caucho","perro","accesorio","/accesoriosperro/pelota.jpg",20,1.95),
	(NULL,"Hueso de juguete","perro","accesorio","/accesoriosperro/huesoJuguete.jpg",20,2.95),
	(NULL,"Gato Azul Ruso","gato","animal","/gatos/gatoazulruso.jpg",2,200),
	(NULL,"Gato Persa","gato","animal","/gatos/gatopersa.jpg",2,150),
	(NULL,"Gato Oriental","gato","animal","/gatos/gatoOriental.jpg",2,300),
	(NULL,"Gato Sphinx","gato","animal","/gatos/gatosphinx.jpg",2,500),
	(NULL,"Gato Siames","gato","animal","/gatos/gatosiames.jpg",2,100),
	(NULL,"Gato Curl Americano","gato","animal","/gatos/curlAmericano.jpg",2,500),
	(NULL,"Pienso para gato esterilizados","gato","alimentacion","/piensogato/piensoGatoEsterelizados.jpg",20,7.50),
	(NULL,"Pienso para cachorros","gato","alimentacion","/piensogato/piensoJuniorGato.jpg",20,6),
	(NULL,"Pienso Ultima Adult","gato","alimentacion","/piensogato/piensoAdult.jpg",20,8),
	(NULL,"Leche Ultima","gato","alimentacion","/piensogato/leche.jpg",20,9),
	(NULL,"Mousses varios sabores","gato","alimentacion","/piensogato/mousse.jpg",20,3.60),
	(NULL,"Trozos de pollo","gato","alimentacion","/piensogato/trozosSupreme.jpg",20,3.50),
	(NULL,"Golosinas sabor pollo","gato","alimentacion","/piensogato/golosinasGato.jpg",20,5),
	(NULL,"Barritas sabor carne","gato","alimentacion","/piensogato/barritasCarne.jpg",20,4),
	(NULL,"Bebedero","gato","accesorio","/accesoriosgato/bebedero.jpg",20,5),
	(NULL,"Collar","gato","accesorio","/accesoriosgato/collar.png",20,2),
	(NULL,"Arenero","gato","accesorio","/accesoriosgato/areneroAglo.jpg",20,10),
	(NULL,"Raton a cuerda","gato","accesorio","/accesoriosgato/raton.jpg",20,3),
	(NULL,"Juguete dispensador de golosinas","gato","accesorio","/accesoriosgato/juguetegolo.jpg",20,4),
	(NULL,"Rascador","gato","accesorio","/accesoriosgato/rascador.jpg",20,15),
	(NULL,"Torre grande","gato","accesorio","/accesoriosgato/torre.jpg",20,22),
	(NULL,"Jaula para transporte","gato","accesorio","/accesoriosgato/jaula.jpg",20,5);

insert into pedido_animales values
	(1, 1, 2),
	(2, 2, 1),
	(3, 3, 1),
	(3, 4, 1),
	(4, 5, 3),
	(4, 6, 4);