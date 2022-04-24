ALTER TABLE `system_users`
ADD COLUMN `name` varchar(255) DEFAULT '***' AFTER `email`;
ALTER TABLE `system_users`
ADD COLUMN `surname` varchar(255) DEFAULT '***' AFTER `name`;