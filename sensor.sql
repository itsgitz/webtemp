-- sensor.sql
-- sql script for "sensor-dc.py"
-- import it to database

-- By: Anggit M Ginanjar
--     anggit.ginanjar@merahputih.id
--     github.com/anggitmg

CREATE TABLE `sensor_dc_log` (
	`id` VARCHAR(8) NOT NULL PRIMARY KEY,
	`temperature` VARCHAR(8) NOT NULL,
	`humidity` VARCHAR(8) NOT NULL,
	`log_time` datetime NOT NULL
); 