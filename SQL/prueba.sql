SELECT
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
group by 1,2,3,4