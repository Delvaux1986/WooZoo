-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 04 mai 2021 à 21:28
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `woozoo`
--

-- --------------------------------------------------------

--
-- Structure de la table `enclosures`
--

CREATE TABLE `enclosures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupy` tinyint(1) DEFAULT NULL,
  `specie_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `enclosures`
--

INSERT INTO `enclosures` (`id`, `name`, `description`, `occupy`, `specie_id`, `updated_at`, `created_at`) VALUES
(1, 'Cage Carnivore', 'Cage pour grand carnivores', 1, NULL, NULL, NULL),
(2, 'Cage Herbivore', 'Cage pour grand Herbivores', 1, NULL, NULL, NULL),
(3, 'Pavillon Singe', 'Cage pour grand carnivores', 1, NULL, NULL, NULL),
(4, 'Volière', 'Cage externe pour oiseaux', 1, NULL, NULL, NULL),
(5, 'Cage Groupe', 'Cage pour animaux de groupes', 1, NULL, NULL, NULL),
(6, 'Aquarium', 'Cage pour poissons', 1, NULL, NULL, NULL),
(7, 'Bassin', 'Cage pour mammifère aquatique', 1, NULL, NULL, NULL),
(8, 'Terrarium', 'Cage pour Insectes/Reptiles', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_04_30_144528_create_sessions_table', 1),
(7, '2021_05_01_094457_create_pets_table', 1),
(8, '2021_05_01_103159_create_species_table', 1),
(9, '2021_05_01_105532_create_enclosures_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pets`
--

CREATE TABLE `pets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `specie_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `lunchtime` time DEFAULT NULL,
  `special_diet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feeds` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pets`
--

INSERT INTO `pets` (`id`, `specie_id`, `user_id`, `name`, `created_at`, `updated_at`, `lunchtime`, `special_diet`, `feeds`) VALUES
(1, 1, 0, 'Kiara', NULL, NULL, NULL, NULL, NULL),
(2, 1, 0, 'Sarafina', NULL, NULL, NULL, NULL, NULL),
(3, 1, 0, 'Nala', NULL, NULL, NULL, NULL, NULL),
(4, 1, 0, 'Aslan', NULL, NULL, NULL, NULL, NULL),
(5, 2, 0, 'Lola', NULL, NULL, NULL, NULL, NULL),
(6, 2, 0, 'Miky', NULL, NULL, NULL, NULL, NULL),
(7, 3, 0, 'Raja', NULL, NULL, NULL, NULL, NULL),
(8, 3, 0, 'Khan', NULL, NULL, NULL, NULL, NULL),
(9, 4, 0, 'Rafiki', NULL, NULL, NULL, NULL, NULL),
(10, 4, 0, 'Kala', NULL, NULL, NULL, NULL, NULL),
(11, 4, 0, 'Miro', NULL, NULL, NULL, NULL, NULL),
(12, 4, 0, 'Loupi', NULL, NULL, NULL, NULL, NULL),
(13, 4, 0, 'Peanuts', NULL, NULL, NULL, NULL, NULL),
(14, 4, 0, 'Victor', NULL, NULL, NULL, NULL, NULL),
(15, 5, 0, 'King', NULL, NULL, NULL, NULL, NULL),
(16, 5, 0, 'Dounia', NULL, NULL, NULL, NULL, NULL),
(17, 6, 0, 'Kira', NULL, NULL, NULL, NULL, NULL),
(18, 6, 0, 'Momak', NULL, NULL, NULL, NULL, NULL),
(19, 6, 0, 'Sully', NULL, NULL, NULL, NULL, NULL),
(20, 6, 0, 'Ramu', NULL, NULL, NULL, NULL, NULL),
(21, 7, 0, 'Lulu', NULL, NULL, NULL, NULL, NULL),
(22, 7, 0, 'Philippe', NULL, NULL, NULL, NULL, NULL),
(23, 7, 0, 'Aby', NULL, NULL, NULL, NULL, NULL),
(24, 8, 0, 'Clayton', NULL, NULL, NULL, NULL, NULL),
(25, 8, 0, 'Timmy', NULL, NULL, NULL, NULL, NULL),
(26, 8, 0, 'Ronflex', NULL, NULL, NULL, NULL, NULL),
(27, 8, 0, 'Oli', NULL, NULL, NULL, NULL, NULL),
(28, 9, 0, 'Sarah', NULL, NULL, NULL, NULL, NULL),
(29, 9, 0, 'John', NULL, NULL, NULL, NULL, NULL),
(30, 10, 0, 'Rikky', NULL, NULL, NULL, NULL, NULL),
(31, 10, 0, 'Martine', NULL, NULL, NULL, NULL, NULL),
(32, 11, 0, 'Adhès', NULL, NULL, NULL, NULL, NULL),
(33, 11, 0, 'Pokali', NULL, NULL, NULL, NULL, NULL),
(34, 12, 0, 'Kuma', NULL, NULL, NULL, NULL, NULL),
(35, 12, 0, 'Dora', NULL, NULL, NULL, NULL, NULL),
(36, 12, 0, 'Rio', NULL, NULL, NULL, NULL, NULL),
(37, 12, 0, 'Furu', NULL, NULL, NULL, NULL, NULL),
(38, 12, 0, 'Happy', NULL, NULL, NULL, NULL, NULL),
(39, 13, 0, 'Fumikage', NULL, NULL, NULL, NULL, NULL),
(40, 13, 0, 'Bower', NULL, NULL, NULL, NULL, NULL),
(41, 14, 0, 'Nagato', NULL, NULL, NULL, NULL, NULL),
(42, 14, 0, 'Yamscha', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('JqrRT4dmHGEgBqRCPXSKdJxW4xUfJhk3fPB7iFgP', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoieGU3bmVVZkU0S0pRTGZ6TW90cDczNGN5T3ZMajRVbmtUTWh0eFcyTiI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJHg3bnAxdFk0Y1dnMTUxMnBFSG5xeC56Yk9Sa25GTG9QRUM0cEVPVjBzUHBDN2hNaHVLc3VPIjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2xvY2FsaG9zdDo4MDAwL3NwZWNpZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1620156456);

-- --------------------------------------------------------

--
-- Structure de la table `species`
--

CREATE TABLE `species` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `specie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `family` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feedSpecie` tinyint(1) DEFAULT NULL,
  `food_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lunchtime` time DEFAULT NULL,
  `lunchtimeTwo` time DEFAULT NULL,
  `lunchtimeThree` time DEFAULT NULL,
  `enclosure_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `species`
--

INSERT INTO `species` (`id`, `specie`, `family`, `feedSpecie`, `food_type`, `lunchtime`, `lunchtimeTwo`, `lunchtimeThree`, `enclosure_id`, `updated_at`, `created_at`) VALUES
(1, 'Félidé', 'Lion', 0, 'Biche', '00:07:00', '00:00:17', NULL, NULL, NULL, NULL),
(2, 'Félidé', 'Léopard', 0, 'Biche', '00:07:25', '00:17:25', NULL, NULL, NULL, NULL),
(3, 'Félidé', 'Tigre', 0, 'Poulet', '00:07:30', '00:17:30', NULL, NULL, NULL, NULL),
(4, 'Primate', 'Chimpanzee', 0, 'Banane', '00:07:45', '00:17:45', NULL, NULL, NULL, NULL),
(5, 'Primate', 'Gorille', 0, 'Légume', '00:08:10', '00:18:10', NULL, NULL, NULL, NULL),
(6, 'Herbivore', 'Antilope', 0, 'Feuilles + Foin', '00:08:25', '00:18:25', NULL, NULL, NULL, NULL),
(7, 'Herbivore', 'Girafe', 0, 'Acacia', '00:08:40', '00:18:40', NULL, NULL, NULL, NULL),
(8, 'Herbivore', 'Elephant', 0, 'Fruits + Foin', '00:08:55', '00:18:55', NULL, NULL, NULL, NULL),
(9, 'Ursidé', 'Panda roux', 0, 'Fruits + Oeuf', '00:09:15', '00:19:15', NULL, NULL, NULL, NULL),
(10, 'Ursidé', 'Ours brun', 0, 'Saumon', '00:09:30', '00:19:30', NULL, NULL, NULL, NULL),
(11, 'Ursidé', 'Ours blanc', 0, 'Phoque', '00:09:45', '00:19:45', NULL, NULL, NULL, NULL),
(12, 'Oiseau', 'Perroquet', 0, 'Graine Spécial', '00:00:10', '00:00:20', NULL, NULL, NULL, NULL),
(13, 'Oiseau', 'Aigle', 0, 'Lapin', '00:10:15', '00:20:15', NULL, NULL, NULL, NULL),
(14, 'Oiseau', 'Vautour', 0, 'Carcasse Boeuf', '00:10:30', '00:20:30', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `workingToday` tinyint(1) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `phone`, `workingToday`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Robby Delvaux', 'Delvaux.robby@protonmail.com', 'Admin', NULL, NULL, NULL, '$2y$10$x7np1tY4cWg1512pEHnqx.zbORknFLoPEC4pEOV0sPpC7hMhuKsuO', NULL, NULL, 'P9Cag6408TxL98Pw96x1UZoS5EEhO3xZ1XHgDpKeJJKlbK0ELVJrfOFiw71t', NULL, NULL, '2021-05-01 12:23:33', '2021-05-01 12:23:33'),
(3, 'Nicode', 'Nicode@Nicode.be', 'Soigneur', 477666444, 0, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Simon', 'Simon@Simon.be', 'Soigneur', 466333222, 0, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Robby', 'Robby@Robby.be', 'Nettoyeur ', 455999777, 1, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Léna', 'Léna@Léna.be', 'Responsable', 488444555, 1, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `enclosures`
--
ALTER TABLE `enclosures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enclosures_specie_id_foreign` (`specie_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pets_specie_id_foreign` (`specie_id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`id`),
  ADD KEY `species_enclosure_id_foreign` (`enclosure_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `enclosures`
--
ALTER TABLE `enclosures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pets`
--
ALTER TABLE `pets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `species`
--
ALTER TABLE `species`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `enclosures`
--
ALTER TABLE `enclosures`
  ADD CONSTRAINT `enclosures_specie_id_foreign` FOREIGN KEY (`specie_id`) REFERENCES `species` (`id`);

--
-- Contraintes pour la table `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_specie_id_foreign` FOREIGN KEY (`specie_id`) REFERENCES `species` (`id`);

--
-- Contraintes pour la table `species`
--
ALTER TABLE `species`
  ADD CONSTRAINT `species_enclosure_id_foreign` FOREIGN KEY (`enclosure_id`) REFERENCES `enclosures` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
