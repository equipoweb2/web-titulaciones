
select
    count(e.id) as egresados,
    sum(CASE WHEN e.id = t.id_alumno_egresado THEN 1 ELSE 0 END) as titulados,
    c.id as id_carrera,
    c.nombre as carrera,
    g.nombre as generacion
  from alumno_egresados e
  left join alumno_titulados t on t.id_alumno_egresado = e.id
  inner join generacions g on g.id = e.id_generacion
  inner join carreras c on c.id = e.id_carrera
group by c.nombre, g.nombre;

-- Egresados
select e.nombre, c.nombre, g.nombre
  from alumno_egresados e
  inner join carreras c on c.id = e.id_carrera
  inner join generacions g on g.id = e.id_generacion
where c.id = 1 and g.id = 6;

-- Titulados
select e.nombre, c.nombre, g.nombre
  from alumno_titulados t
  inner join alumno_egresados e on e.id = t.id_alumno_egresado
  inner join carreras c on c.id = e.id_carrera
  inner join generacions g on g.id = e.id_generacion
where c.id = 1 and g.id = 6;
