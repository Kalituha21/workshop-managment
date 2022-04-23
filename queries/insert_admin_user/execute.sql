INSERT INTO `system_users` (
    `username`,
    `auth_key`,
    `password_hash`,
    `status`,
    `role`,
    `created_at`,
    `updated_at`
)
VALUES (
    'admin',
    'GnPEyyh4ZnuDgEEcTuFs-2HAHm9Jq5fo',
    '$2y$13$TOSCmGUYDmWewoYjv8VM2.zejzhAuqmQUKpN3BP6xQp7PcmnNq006',
    1,
    0,
    unix_timestamp(),
    unix_timestamp()
);