SELECT sku AS Codigo_de_producto, SUM(cantidad) AS TotalCantidades,SUM(precio_unitario) AS valor_venta,SUM(costo_unitario) AS Total_costo 
FROM facturacion_detalle 
GROUP BY sku
ORDER BY SUM(cantidad) DESC;
