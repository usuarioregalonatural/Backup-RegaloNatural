select
	carros.Fecha_Carro, carros.Mes_Carro, carros.Num_Carritos, carros.Id_Producto, carros.Producto, carros.Num_Productos_Carritos, replace(carros.Importe_Prod_Carritos,".",',') as Importe_Prod_Carritos,
	pedidos.Fecha_Pedido, pedidos.Mes_Pedido, pedidos.Id_Producto, pedidos.Producto,pedidos.Cantidad_Prod_Pedidos, coalesce(replace(pedidos.Importe_Prod_Pedidos,".",','),0) as Importe_Prod_Pedidos

from (
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
and carro.date_add>= '2019-09-01'

group by 1,2,4,5
) as carros
left outer join
(SELECT
	date(pedidos.date_add) as Fecha_Pedido,
    month(date(pedidos.invoice_date)) as Mes_Pedido,
    prdlang.id_product as Id_Producto,
	prdlang.name as Producto,
	sum(linped.product_quantity) as Cantidad_Prod_Pedidos,
	sum((linped.product_quantity*linped.product_price)-(linped.reduction_percent/(linped.product_quantity*linped.product_price))) as Importe_Prod_Pedidos

from ps_orders pedidos
left outer join ps_order_detail linped
	on pedidos.id_order=linped.id_order
left outer join ps_product productos
	on linped.product_id=productos.id_product
left outer join ps_product_lang prdlang
  on productos.id_product=prdlang.id_product


where pedidos.date_add>= '2019-05-01'
and pedidos.valid=1
and pedidos.date_add>= '2019-09-01'

group by 1,2,3,4
) as pedidos
on carros.Fecha_Carro=pedidos.Fecha_Pedido
and carros.Id_Producto=pedidos.Id_Producto
order by carros.Fecha_Carro
;