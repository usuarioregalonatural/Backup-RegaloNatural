SELECT
	date(carro.date_add) as Fecha_Carro,
    month(date(carro.date_add)) as Mes_Carro,
    count(distinct carro.id_cart) as Num_Carritos,
    prdlang.id_product as Id_Producto,
	prdlang.name as Producto,
	sum(carprod.quantity) as Num_Productos_Carritos,
	sum((carprod.quantity * prod.price) ) as Importe_Prod_Carritos
FROM ps_cart_product carprod
left outer join ps_product prod
  on carprod.id_product=prod.id_product
left outer join ps_product_lang prdlang
  on prod.id_product=prdlang.id_product
inner join ps_cart carro
  on carprod.id_cart=carro.id_cart
where carro.date_add>= '2019-05-01'
and carro.date_add>= '2019-05-01'
group by 1,2,4,5
order by Fecha_Carro desc;