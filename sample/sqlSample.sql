Шаблоны sql

Просмотр
SELECT * FROM `students` WHERE 1
SELECT `id`, `name`, `password`, `date` FROM `students` WHERE 1

Обновление
INSERT INTO `students`(`id`, `name`, `password`, `date`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')

Добавление
UPDATE `students` SET `id`='[value-1]',`name`='[value-2]',`password`='[value-3]',`date`='[value-4]' WHERE 1

Удаление
DELETE FROM `students` WHERE 0