--Consultas SQL

SELECT status_id, COUNT(*) AS CANTIDAD,b.status_name,c.name  as ASESOR FROM ticket as a
inner join status as b
on a.status_id = b.id 
left join (select DISTINCT id from asesor)as c
on a.asigned_id = c.id  
WHERE YEAR(created_at) = '2020'
GROUP BY asigned_id,b.status_name ,c.name 
ORDER BY CANTIDAD DESC

SELECT asigned_id AS ASESOR, COUNT(*) AS CANTIDAD,b.status_name, c.name AS ESTADO FROM ticket as a
inner join status as b
on a.status_id = b.id 
left join (select DISTINCT id from asesor)as c
on a.asigned_id = c.id  
WHERE YEAR(created_at) = '2020'
GROUP BY asigned_id,ESTADO
ORDER BY ASESOR DESC

SELECT pz.asigned_id, pz.status_id, f.status_name, w.name
FROM ticket pz
INNER JOIN status f ON pz.status_id = f.id
INNER JOIN asesor w ON w.id = pz.asigned_id
WHERE YEAR(created_at) = '2020' and pz.status_id IN (2,3,5)
GROUP BY asigned_id,status_id
ORDER BY pz.asigned_id

-------------------------|
SELECT COUNT(*) AS CANTIDAD, pz.asigned_id, pz.status_id, f.status_name, w.name
FROM ticket pz
INNER JOIN status f ON pz.status_id = f.id
INNER JOIN asesor w ON w.id = pz.asigned_id
WHERE YEAR(created_at) = '2020' and pz.status_id IN (2,3,5)
GROUP BY asigned_id,status_id
ORDER BY pz.asigned_id


--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `modulo_id` int(11) NOT NULL,  
  `r` int(11) NOT NULL,
  `w` int(11) NOT NULL,
  `u` int(11) NOT NULL,
  `d` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Indices de la tabla `portafolio`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`),
  ADD KEY `rol_id` (`rol_id`),
  ADD KEY `modulo_id` (`modulo_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `portafolio`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT;

--
-- Filtros para la tabla `atencion`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id_rol`),
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`modulo_id`) REFERENCES `modulo` (`id_modulo`);




alter table `user`
  add `rolid` int(11) NOT NULL;


ALTER TABLE `user`  
  ADD KEY `rolid` (`rolid`);

  
 ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`id_rol`);




  