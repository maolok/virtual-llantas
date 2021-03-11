SELECT facturacion.fecha_realizacion,facturacion.hora_realizacion,tercero.documento,tercero.nombre,facturacion.fact_consecutivo
FROM facturacion 
LEFT JOIN tercero 
ON facturacion.id_tercero = tercero.id_tercero order by fecha_realizacion; 
