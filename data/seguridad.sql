-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-10-2016 a las 11:43:22
-- Versión del servidor: 5.5.52-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `expedientes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('ConsultarRegistros', 2, 1475621774),
('ConsultarRegistros', 3, 1475621765),
('ConsultarRegistros', 4, 1475621730),
('ConsultarRegistros', 5, 1475621745),
('EliminarRegistros', 4, 1475621730),
('EliminarRegistros', 5, 1475621745),
('LlenarRegistros', 4, 1475621730),
('ModificarRegistros', 4, 1475621730),
('ModificarRegistros', 5, 1475621745);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `group_code` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  KEY `fk_auth_item_group_code` (`group_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`, `group_code`) VALUES
('/*', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('//*', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('//controller', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('//crud', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('//extension', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('//form', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('//index', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('//migrik', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('//migrikdata', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('//migrikdoc', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('//model', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('//module', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/asset/*', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/asset/compress', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/asset/template', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/cache/*', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/cache/flush', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/cache/flush-all', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/cache/flush-schema', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/cache/index', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/captador/*', 3, NULL, NULL, NULL, 1475555241, 1475555241, NULL),
('/captador/create', 3, NULL, NULL, NULL, 1475555241, 1475555241, NULL),
('/captador/delete', 3, NULL, NULL, NULL, 1475555241, 1475555241, NULL),
('/captador/index', 3, NULL, NULL, NULL, 1475555242, 1475555242, NULL),
('/captador/update', 3, NULL, NULL, NULL, 1475555241, 1475555241, NULL),
('/captador/view', 3, NULL, NULL, NULL, 1475555241, 1475555241, NULL),
('/debug/*', 3, NULL, NULL, NULL, 1475555242, 1475555242, NULL),
('/debug/default/*', 3, NULL, NULL, NULL, 1475555242, 1475555242, NULL),
('/debug/default/db-explain', 3, NULL, NULL, NULL, 1475555242, 1475555242, NULL),
('/debug/default/download-mail', 3, NULL, NULL, NULL, 1475555242, 1475555242, NULL),
('/debug/default/index', 3, NULL, NULL, NULL, 1475555242, 1475555242, NULL),
('/debug/default/toolbar', 3, NULL, NULL, NULL, 1475555242, 1475555242, NULL),
('/debug/default/view', 3, NULL, NULL, NULL, 1475555242, 1475555242, NULL),
('/familiares/*', 3, NULL, NULL, NULL, 1475555241, 1475555241, NULL),
('/familiares/create', 3, NULL, NULL, NULL, 1475555241, 1475555241, NULL),
('/familiares/delete', 3, NULL, NULL, NULL, 1475555241, 1475555241, NULL),
('/familiares/index', 3, NULL, NULL, NULL, 1475555241, 1475555241, NULL),
('/familiares/update', 3, NULL, NULL, NULL, 1475555241, 1475555241, NULL),
('/familiares/view', 3, NULL, NULL, NULL, 1475555241, 1475555241, NULL),
('/fisionomia/*', 3, NULL, NULL, NULL, 1475555241, 1475555241, NULL),
('/fisionomia/create', 3, NULL, NULL, NULL, 1475555241, 1475555241, NULL),
('/fisionomia/delete', 3, NULL, NULL, NULL, 1475555241, 1475555241, NULL),
('/fisionomia/index', 3, NULL, NULL, NULL, 1475555241, 1475555241, NULL),
('/fisionomia/update', 3, NULL, NULL, NULL, 1475555241, 1475555241, NULL),
('/fisionomia/view', 3, NULL, NULL, NULL, 1475555241, 1475555241, NULL),
('/fixture/*', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/fixture/load', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/fixture/unload', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/gii/*', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/gii/default/*', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/gii/default/action', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/gii/default/diff', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/gii/default/index', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/gii/default/preview', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/gii/default/view', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/hello/*', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/hello/index', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/help/*', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/help/index', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/message/*', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/message/config', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/message/config-template', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/message/extract', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/migrate/*', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/migrate/create', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/migrate/down', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/migrate/history', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/migrate/mark', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/migrate/new', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/migrate/redo', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/migrate/to', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/migrate/up', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/oficiales/*', 3, NULL, NULL, NULL, 1475555240, 1475555240, NULL),
('/oficiales/create', 3, NULL, NULL, NULL, 1475555240, 1475555240, NULL),
('/oficiales/delete', 3, NULL, NULL, NULL, 1475555240, 1475555240, NULL),
('/oficiales/index', 3, NULL, NULL, NULL, 1475555241, 1475555241, NULL),
('/oficiales/update', 3, NULL, NULL, NULL, 1475555240, 1475555240, NULL),
('/oficiales/view', 3, NULL, NULL, NULL, 1475555241, 1475555241, NULL),
('/persona/*', 3, NULL, NULL, NULL, 1475555240, 1475555240, NULL),
('/persona/ajax-municipio', 3, NULL, NULL, NULL, 1475555240, 1475555240, NULL),
('/persona/ajax-parroquia', 3, NULL, NULL, NULL, 1475555240, 1475555240, NULL),
('/persona/create', 3, NULL, NULL, NULL, 1475555240, 1475555240, NULL),
('/persona/delete', 3, NULL, NULL, NULL, 1475555240, 1475555240, NULL),
('/persona/detalles', 3, NULL, NULL, NULL, 1476466684, 1476466684, NULL),
('/persona/index', 3, NULL, NULL, NULL, 1475555240, 1475555240, NULL),
('/persona/update', 3, NULL, NULL, NULL, 1475555240, 1475555240, NULL),
('/persona/view', 3, NULL, NULL, NULL, 1475555240, 1475555240, NULL),
('/serve/*', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/serve/index', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/site/*', 3, NULL, NULL, NULL, 1475555239, 1475555239, NULL),
('/site/about', 3, NULL, NULL, NULL, 1475555240, 1475555240, NULL),
('/site/captcha', 3, NULL, NULL, NULL, 1475555240, 1475555240, NULL),
('/site/contact', 3, NULL, NULL, NULL, 1475555240, 1475555240, NULL),
('/site/error', 3, NULL, NULL, NULL, 1475555240, 1475555240, NULL),
('/site/index', 3, NULL, NULL, NULL, 1475555240, 1475555240, NULL),
('/site/login', 3, NULL, NULL, NULL, 1475555240, 1475555240, NULL),
('/site/logout', 3, NULL, NULL, NULL, 1475555240, 1475555240, NULL),
('/sociologico/*', 3, NULL, NULL, NULL, 1475555239, 1475555239, NULL),
('/sociologico/create', 3, NULL, NULL, NULL, 1475555239, 1475555239, NULL),
('/sociologico/delete', 3, NULL, NULL, NULL, 1475555239, 1475555239, NULL),
('/sociologico/index', 3, NULL, NULL, NULL, 1475555239, 1475555239, NULL),
('/sociologico/update', 3, NULL, NULL, NULL, 1475555239, 1475555239, NULL),
('/sociologico/view', 3, NULL, NULL, NULL, 1475555239, 1475555239, NULL),
('/unidad/*', 3, NULL, NULL, NULL, 1475555239, 1475555239, NULL),
('/unidad/create', 3, NULL, NULL, NULL, 1475555239, 1475555239, NULL),
('/unidad/delete', 3, NULL, NULL, NULL, 1475555239, 1475555239, NULL),
('/unidad/index', 3, NULL, NULL, NULL, 1475555239, 1475555239, NULL),
('/unidad/update', 3, NULL, NULL, NULL, 1475555239, 1475555239, NULL),
('/unidad/view', 3, NULL, NULL, NULL, 1475555239, 1475555239, NULL),
('/uniforme/*', 3, NULL, NULL, NULL, 1475555238, 1475555238, NULL),
('/uniforme/create', 3, NULL, NULL, NULL, 1475555239, 1475555239, NULL),
('/uniforme/delete', 3, NULL, NULL, NULL, 1475555238, 1475555238, NULL),
('/uniforme/index', 3, NULL, NULL, NULL, 1475555239, 1475555239, NULL),
('/uniforme/update', 3, NULL, NULL, NULL, 1475555239, 1475555239, NULL),
('/uniforme/view', 3, NULL, NULL, NULL, 1475555239, 1475555239, NULL),
('/user-management/*', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/user-management/auth-item-group/*', 3, NULL, NULL, NULL, 1475555244, 1475555244, NULL),
('/user-management/auth-item-group/bulk-activate', 3, NULL, NULL, NULL, 1475555244, 1475555244, NULL),
('/user-management/auth-item-group/bulk-deactivate', 3, NULL, NULL, NULL, 1475555244, 1475555244, NULL),
('/user-management/auth-item-group/bulk-delete', 3, NULL, NULL, NULL, 1475555244, 1475555244, NULL),
('/user-management/auth-item-group/create', 3, NULL, NULL, NULL, 1475555245, 1475555245, NULL),
('/user-management/auth-item-group/delete', 3, NULL, NULL, NULL, 1475555245, 1475555245, NULL),
('/user-management/auth-item-group/grid-page-size', 3, NULL, NULL, NULL, 1475555244, 1475555244, NULL),
('/user-management/auth-item-group/grid-sort', 3, NULL, NULL, NULL, 1475555244, 1475555244, NULL),
('/user-management/auth-item-group/index', 3, NULL, NULL, NULL, 1475555245, 1475555245, NULL),
('/user-management/auth-item-group/toggle-attribute', 3, NULL, NULL, NULL, 1475555244, 1475555244, NULL),
('/user-management/auth-item-group/update', 3, NULL, NULL, NULL, 1475555245, 1475555245, NULL),
('/user-management/auth-item-group/view', 3, NULL, NULL, NULL, 1475555245, 1475555245, NULL),
('/user-management/auth/*', 3, NULL, NULL, NULL, 1475555245, 1475555245, NULL),
('/user-management/auth/captcha', 3, NULL, NULL, NULL, 1475555245, 1475555245, NULL),
('/user-management/auth/change-own-password', 3, NULL, NULL, NULL, 1475551146, 1475551146, NULL),
('/user-management/auth/confirm-email', 3, NULL, NULL, NULL, 1475555245, 1475555245, NULL),
('/user-management/auth/confirm-email-receive', 3, NULL, NULL, NULL, 1475555245, 1475555245, NULL),
('/user-management/auth/confirm-registration-email', 3, NULL, NULL, NULL, 1475555245, 1475555245, NULL),
('/user-management/auth/login', 3, NULL, NULL, NULL, 1475555245, 1475555245, NULL),
('/user-management/auth/logout', 3, NULL, NULL, NULL, 1475555245, 1475555245, NULL),
('/user-management/auth/password-recovery', 3, NULL, NULL, NULL, 1475555245, 1475555245, NULL),
('/user-management/auth/password-recovery-receive', 3, NULL, NULL, NULL, 1475555245, 1475555245, NULL),
('/user-management/auth/registration', 3, NULL, NULL, NULL, 1475555245, 1475555245, NULL),
('/user-management/permission/*', 3, NULL, NULL, NULL, 1475555244, 1475555244, NULL),
('/user-management/permission/bulk-activate', 3, NULL, NULL, NULL, 1475555244, 1475555244, NULL),
('/user-management/permission/bulk-deactivate', 3, NULL, NULL, NULL, 1475555244, 1475555244, NULL),
('/user-management/permission/bulk-delete', 3, NULL, NULL, NULL, 1475555244, 1475555244, NULL),
('/user-management/permission/create', 3, NULL, NULL, NULL, 1475555244, 1475555244, NULL),
('/user-management/permission/delete', 3, NULL, NULL, NULL, 1475555244, 1475555244, NULL),
('/user-management/permission/grid-page-size', 3, NULL, NULL, NULL, 1475555244, 1475555244, NULL),
('/user-management/permission/grid-sort', 3, NULL, NULL, NULL, 1475555244, 1475555244, NULL),
('/user-management/permission/index', 3, NULL, NULL, NULL, 1475555244, 1475555244, NULL),
('/user-management/permission/refresh-routes', 3, NULL, NULL, NULL, 1475555244, 1475555244, NULL),
('/user-management/permission/set-child-permissions', 3, NULL, NULL, NULL, 1475555244, 1475555244, NULL),
('/user-management/permission/set-child-routes', 3, NULL, NULL, NULL, 1475555244, 1475555244, NULL),
('/user-management/permission/toggle-attribute', 3, NULL, NULL, NULL, 1475555244, 1475555244, NULL),
('/user-management/permission/update', 3, NULL, NULL, NULL, 1475555244, 1475555244, NULL),
('/user-management/permission/view', 3, NULL, NULL, NULL, 1475555244, 1475555244, NULL),
('/user-management/role/*', 3, NULL, NULL, NULL, 1475555243, 1475555243, NULL),
('/user-management/role/bulk-activate', 3, NULL, NULL, NULL, 1475555243, 1475555243, NULL),
('/user-management/role/bulk-deactivate', 3, NULL, NULL, NULL, 1475555243, 1475555243, NULL),
('/user-management/role/bulk-delete', 3, NULL, NULL, NULL, 1475555243, 1475555243, NULL),
('/user-management/role/create', 3, NULL, NULL, NULL, 1475555243, 1475555243, NULL),
('/user-management/role/delete', 3, NULL, NULL, NULL, 1475555243, 1475555243, NULL),
('/user-management/role/grid-page-size', 3, NULL, NULL, NULL, 1475555243, 1475555243, NULL),
('/user-management/role/grid-sort', 3, NULL, NULL, NULL, 1475555243, 1475555243, NULL),
('/user-management/role/index', 3, NULL, NULL, NULL, 1475555243, 1475555243, NULL),
('/user-management/role/set-child-permissions', 3, NULL, NULL, NULL, 1475555243, 1475555243, NULL),
('/user-management/role/set-child-roles', 3, NULL, NULL, NULL, 1475555243, 1475555243, NULL),
('/user-management/role/toggle-attribute', 3, NULL, NULL, NULL, 1475555243, 1475555243, NULL),
('/user-management/role/update', 3, NULL, NULL, NULL, 1475555243, 1475555243, NULL),
('/user-management/role/view', 3, NULL, NULL, NULL, 1475555243, 1475555243, NULL),
('/user-management/user-permission/*', 3, NULL, NULL, NULL, 1475555243, 1475555243, NULL),
('/user-management/user-permission/set', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/user-management/user-permission/set-roles', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/user-management/user-visit-log/*', 3, NULL, NULL, NULL, 1475555242, 1475555242, NULL),
('/user-management/user-visit-log/bulk-activate', 3, NULL, NULL, NULL, 1475555242, 1475555242, NULL),
('/user-management/user-visit-log/bulk-deactivate', 3, NULL, NULL, NULL, 1475555242, 1475555242, NULL),
('/user-management/user-visit-log/bulk-delete', 3, NULL, NULL, NULL, 1475555242, 1475555242, NULL),
('/user-management/user-visit-log/create', 3, NULL, NULL, NULL, 1475555243, 1475555243, NULL),
('/user-management/user-visit-log/delete', 3, NULL, NULL, NULL, 1475555242, 1475555242, NULL),
('/user-management/user-visit-log/grid-page-size', 3, NULL, NULL, NULL, 1475555242, 1475555242, NULL),
('/user-management/user-visit-log/grid-sort', 3, NULL, NULL, NULL, 1475555242, 1475555242, NULL),
('/user-management/user-visit-log/index', 3, NULL, NULL, NULL, 1475555243, 1475555243, NULL),
('/user-management/user-visit-log/toggle-attribute', 3, NULL, NULL, NULL, 1475555242, 1475555242, NULL),
('/user-management/user-visit-log/update', 3, NULL, NULL, NULL, 1475555243, 1475555243, NULL),
('/user-management/user-visit-log/view', 3, NULL, NULL, NULL, 1475555243, 1475555243, NULL),
('/user-management/user/*', 3, NULL, NULL, NULL, 1475555243, 1475555243, NULL),
('/user-management/user/bulk-activate', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/user-management/user/bulk-deactivate', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/user-management/user/bulk-delete', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/user-management/user/change-password', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/user-management/user/create', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/user-management/user/delete', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/user-management/user/grid-page-size', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/user-management/user/grid-sort', 3, NULL, NULL, NULL, 1475555243, 1475555243, NULL),
('/user-management/user/index', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/user-management/user/toggle-attribute', 3, NULL, NULL, NULL, 1475555243, 1475555243, NULL),
('/user-management/user/update', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('/user-management/user/view', 3, NULL, NULL, NULL, 1475551145, 1475551145, NULL),
('Admin', 1, 'Administración', NULL, NULL, 1475551145, 1475555180, NULL),
('assignRolesToUsers', 2, 'Asignar roles a usuarios', NULL, NULL, 1475551145, 1475553489, 'userManagement'),
('bindUserToIp', 2, 'Casar usuario a IP', NULL, NULL, 1475551145, 1475553526, 'userManagement'),
('changeOwnPassword', 2, 'Cambiar propia contraseña', NULL, NULL, 1475551146, 1475553299, 'userCommonPermissions'),
('changeUserPassword', 2, 'Cambiar contraseña de usuario', NULL, NULL, 1475551145, 1475553319, 'userManagement'),
('commonPermission', 2, 'Permiso común', NULL, NULL, 1475551143, 1476035472, NULL),
('ConsultarDetalleRegistro', 1, 'Consultar Detalle de Registro', NULL, NULL, 1476131408, 1476131408, NULL),
('ConsultarRegistros', 1, 'Consultar Registros', NULL, NULL, 1475621470, 1475621470, NULL),
('createCaptador', 2, 'Crear Captador', NULL, NULL, 1476126274, 1476126274, 'administracionCaptador'),
('createDatosFamiliaresPersonal', 2, 'Crear Datos Familiares de Personal', NULL, NULL, 1475620006, 1475620035, 'administracionPersonal'),
('createDatosSociologicosPersonal', 2, 'Crear Datos Sociológicos de Personal', NULL, NULL, 1475620303, 1475620303, 'administracionPersonal'),
('createFisionomiaPersonal', 2, 'Crear Fisionomía del Personal', NULL, NULL, 1475620525, 1475620525, 'administracionPersonal'),
('createOficial', 2, 'Crear Oficial', NULL, NULL, 1475581569, 1475581569, 'administracionOficiales'),
('createPersonal', 2, 'Crear Personal', NULL, NULL, 1475555410, 1475555410, 'administracionPersonal'),
('createUnidadBatallon', 2, 'Crear Unidad de Batallón', NULL, NULL, 1475581703, 1475581703, 'administracionUnidadBatallon'),
('createUniformePersonal', 2, 'Crear Uniforme del Personal', NULL, NULL, 1475620729, 1475620729, 'administracionPersonal'),
('createUsers', 2, 'Crear usuarios', NULL, NULL, 1475551145, 1475553378, 'userManagement'),
('deleteCaptador', 2, 'Eliminar Captador', NULL, NULL, 1476126432, 1476126432, 'administracionCaptador'),
('deleteDatosFamiliaresPersonal', 2, 'Eliminar Datos Familiares de Personal', NULL, NULL, 1475620200, 1475620200, 'administracionPersonal'),
('deleteDatosSociologicosPersonal', 2, 'Eliminar Datos Sociológicos de Personal', NULL, NULL, 1475620441, 1475620441, 'administracionPersonal'),
('deleteFisionomiaPersonal', 2, 'Eliminar Fisionomía del Personal', NULL, NULL, 1475620666, 1475620666, 'administracionPersonal'),
('deleteOficial', 2, 'Eliminar Oficial', NULL, NULL, 1475581627, 1475581627, 'administracionOficiales'),
('deletePersonal', 2, 'Eliminar Personal', NULL, NULL, 1475555336, 1475555336, 'administracionPersonal'),
('deleteUnidadBatallon', 2, 'Eliminar Unidad de Batallón', NULL, NULL, 1475581790, 1475581790, 'administracionUnidadBatallon'),
('deleteUniformePersonal', 2, 'Eliminar Uniforme del Personal', NULL, NULL, 1475620840, 1475620840, 'administracionPersonal'),
('deleteUsers', 2, 'Eliminar usuarios', NULL, NULL, 1475551145, 1475553400, 'userManagement'),
('detallesPersonal', 2, 'Ficha General del Personal', NULL, NULL, 1476466655, 1476494373, 'administracionPersonal'),
('editCaptador', 2, 'Editar Captador', NULL, NULL, 1476126306, 1476126306, 'administracionCaptador'),
('editDatosFamiliaresPersonal', 2, 'Editar Datos Familiares de Personal', NULL, NULL, 1475620072, 1475620165, 'administracionPersonal'),
('editDatosSociologicosPersonal', 2, 'Editar Datos Sociológicos de Personal', NULL, NULL, 1475620362, 1475620362, 'administracionPersonal'),
('editFisionomiaPersonal', 2, 'Editar Fisionomía del Personal', NULL, NULL, 1475620593, 1475620593, 'administracionPersonal'),
('editOficial', 2, 'Editar Oficial', NULL, NULL, 1475581590, 1475581590, 'administracionOficiales'),
('editPersonal', 2, 'Editar Personal', NULL, NULL, 1475555366, 1475555366, 'administracionPersonal'),
('editUnidadBatallon', 2, 'Editar  Unidad de Batallón', NULL, NULL, 1475581754, 1475581754, 'administracionUnidadBatallon'),
('editUniformePersonal', 2, 'Editar Uniforme del Personal', NULL, NULL, 1475620774, 1475620774, 'administracionPersonal'),
('editUserEmail', 2, 'Editar correo electrónico de usuario', NULL, NULL, 1475551145, 1475553470, 'userManagement'),
('editUsers', 2, 'Editar usuarios', NULL, NULL, 1475551145, 1475553363, 'userManagement'),
('EliminarRegistros', 1, 'Eliminar Registros', NULL, NULL, 1475621554, 1475621554, NULL),
('ListarRegistros', 1, 'Listar Registros', NULL, NULL, 1476129759, 1476129759, NULL),
('listCaptadores', 2, 'Listar Captadores', NULL, NULL, 1476126364, 1476130328, 'administracionCaptador'),
('listDatosFamiliaresPersonal', 2, 'Listar Datos Familiares de Personal', NULL, NULL, 1476131057, 1476131057, 'administracionPersonal'),
('listDatosSociologicosPersonal', 2, 'Listar Datos Sociológicos de Personal', NULL, NULL, 1476130932, 1476130932, 'administracionPersonal'),
('listFisionomiaPersonal', 2, 'Listar Fisionomía del Personal', NULL, NULL, 1476130809, 1476130809, 'administracionPersonal'),
('listOficial', 2, 'Listar Oficial', NULL, NULL, 1476129946, 1476129946, 'administracionOficiales'),
('listPersonal', 2, 'Listar Personal', NULL, NULL, 1476131146, 1476131146, 'administracionPersonal'),
('listUnidadBatallon', 2, 'Listar Unidad de Batallón', NULL, NULL, 1476130290, 1476130290, 'administracionUnidadBatallon'),
('listUniformePersonal', 2, 'Listar Uniforme del Personal', NULL, NULL, 1476130642, 1476130642, 'administracionPersonal'),
('LlenarRegistros', 1, 'Llenar Registros', NULL, NULL, 1475621425, 1475621425, NULL),
('ModificarRegistros', 1, 'Modificar Registros', NULL, NULL, 1475621524, 1475621524, NULL),
('viewCaptador', 2, 'Ver Captador', NULL, NULL, 1476126398, 1476126398, 'administracionCaptador'),
('viewDatosFamiliaresPersonal', 2, 'Ver Datos Familiares de Personal', NULL, NULL, 1475620144, 1475620144, 'administracionPersonal'),
('viewDatosSociologicosPersonal', 2, 'Ver Datos Sociológicos de Personal', NULL, NULL, 1475620406, 1475620406, 'administracionPersonal'),
('viewFisionomiaPersonal', 2, 'Ver Fisionomía del Personal', NULL, NULL, 1475620628, 1475620628, 'administracionPersonal'),
('viewOficial', 2, 'Ver Oficial', NULL, NULL, 1475581608, 1475581608, 'administracionOficiales'),
('viewPersonal', 2, 'Ver Personal', NULL, NULL, 1475555285, 1475555285, 'administracionPersonal'),
('viewRegistrationIp', 2, 'Ver registro de IP', NULL, NULL, 1475551145, 1475553626, 'userManagement'),
('viewUnidadBatallon', 2, 'Ver Unidad de Batallón', NULL, NULL, 1475581728, 1475581728, 'administracionUnidadBatallon'),
('viewUniformePersonal', 2, 'Ver Uniforme del Personal', NULL, NULL, 1475620807, 1475620807, 'administracionPersonal'),
('viewUserEmail', 2, 'Ver correo electrónico de usuario', NULL, NULL, 1475551145, 1475553457, 'userManagement'),
('viewUserRoles', 2, 'Ver roles de usuarios', NULL, NULL, 1475551145, 1475553427, 'userManagement'),
('viewUsers', 2, 'Ver usuarios', NULL, NULL, 1475551145, 1475553373, 'userManagement'),
('viewVisitLog', 2, 'Ver registro de visita', NULL, NULL, 1475551145, 1475553543, 'userManagement');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('createCaptador', '/captador/create'),
('deleteCaptador', '/captador/delete'),
('listCaptadores', '/captador/index'),
('editCaptador', '/captador/update'),
('viewCaptador', '/captador/view'),
('createDatosFamiliaresPersonal', '/familiares/create'),
('deleteDatosFamiliaresPersonal', '/familiares/delete'),
('listDatosFamiliaresPersonal', '/familiares/index'),
('editDatosFamiliaresPersonal', '/familiares/update'),
('viewDatosFamiliaresPersonal', '/familiares/view'),
('createFisionomiaPersonal', '/fisionomia/create'),
('deleteFisionomiaPersonal', '/fisionomia/delete'),
('listFisionomiaPersonal', '/fisionomia/index'),
('editFisionomiaPersonal', '/fisionomia/update'),
('viewFisionomiaPersonal', '/fisionomia/view'),
('createOficial', '/oficiales/create'),
('deleteOficial', '/oficiales/delete'),
('listOficial', '/oficiales/index'),
('editOficial', '/oficiales/update'),
('viewOficial', '/oficiales/view'),
('createPersonal', '/persona/create'),
('deletePersonal', '/persona/delete'),
('detallesPersonal', '/persona/detalles'),
('listPersonal', '/persona/index'),
('editPersonal', '/persona/update'),
('viewPersonal', '/persona/view'),
('commonPermission', '/site/about'),
('commonPermission', '/site/contact'),
('commonPermission', '/site/index'),
('createDatosSociologicosPersonal', '/sociologico/create'),
('deleteDatosSociologicosPersonal', '/sociologico/delete'),
('listDatosSociologicosPersonal', '/sociologico/index'),
('editDatosSociologicosPersonal', '/sociologico/update'),
('viewDatosSociologicosPersonal', '/sociologico/view'),
('createUnidadBatallon', '/unidad/create'),
('deleteUnidadBatallon', '/unidad/delete'),
('listUnidadBatallon', '/unidad/index'),
('editUnidadBatallon', '/unidad/update'),
('viewUnidadBatallon', '/unidad/view'),
('createUniformePersonal', '/uniforme/create'),
('deleteUniformePersonal', '/uniforme/delete'),
('listUniformePersonal', '/uniforme/index'),
('editUniformePersonal', '/uniforme/update'),
('viewUniformePersonal', '/uniforme/view'),
('changeOwnPassword', '/user-management/auth/change-own-password'),
('commonPermission', '/user-management/auth/change-own-password'),
('commonPermission', '/user-management/auth/confirm-email'),
('assignRolesToUsers', '/user-management/user-permission/set'),
('assignRolesToUsers', '/user-management/user-permission/set-roles'),
('editUsers', '/user-management/user/bulk-activate'),
('editUsers', '/user-management/user/bulk-deactivate'),
('deleteUsers', '/user-management/user/bulk-delete'),
('changeUserPassword', '/user-management/user/change-password'),
('createUsers', '/user-management/user/create'),
('deleteUsers', '/user-management/user/delete'),
('viewUsers', '/user-management/user/grid-page-size'),
('viewUsers', '/user-management/user/index'),
('editUsers', '/user-management/user/update'),
('viewUsers', '/user-management/user/view'),
('Admin', 'assignRolesToUsers'),
('Admin', 'changeOwnPassword'),
('Admin', 'changeUserPassword'),
('ConsultarRegistros', 'ConsultarDetalleRegistro'),
('LlenarRegistros', 'createCaptador'),
('LlenarRegistros', 'createDatosFamiliaresPersonal'),
('LlenarRegistros', 'createDatosSociologicosPersonal'),
('LlenarRegistros', 'createFisionomiaPersonal'),
('LlenarRegistros', 'createOficial'),
('LlenarRegistros', 'createPersonal'),
('LlenarRegistros', 'createUnidadBatallon'),
('LlenarRegistros', 'createUniformePersonal'),
('Admin', 'createUsers'),
('EliminarRegistros', 'deleteCaptador'),
('EliminarRegistros', 'deleteDatosFamiliaresPersonal'),
('EliminarRegistros', 'deleteDatosSociologicosPersonal'),
('EliminarRegistros', 'deleteFisionomiaPersonal'),
('EliminarRegistros', 'deleteOficial'),
('EliminarRegistros', 'deletePersonal'),
('EliminarRegistros', 'deleteUnidadBatallon'),
('EliminarRegistros', 'deleteUniformePersonal'),
('Admin', 'deleteUsers'),
('ConsultarDetalleRegistro', 'detallesPersonal'),
('ModificarRegistros', 'editCaptador'),
('ModificarRegistros', 'editDatosFamiliaresPersonal'),
('ModificarRegistros', 'editDatosSociologicosPersonal'),
('ModificarRegistros', 'editFisionomiaPersonal'),
('ModificarRegistros', 'editOficial'),
('ModificarRegistros', 'editPersonal'),
('ModificarRegistros', 'editUnidadBatallon'),
('ModificarRegistros', 'editUniformePersonal'),
('Admin', 'editUsers'),
('ConsultarRegistros', 'ListarRegistros'),
('ListarRegistros', 'listCaptadores'),
('ListarRegistros', 'listDatosFamiliaresPersonal'),
('ListarRegistros', 'listDatosSociologicosPersonal'),
('ListarRegistros', 'listFisionomiaPersonal'),
('ListarRegistros', 'listOficial'),
('ListarRegistros', 'listPersonal'),
('ListarRegistros', 'listUnidadBatallon'),
('ListarRegistros', 'listUniformePersonal'),
('ConsultarDetalleRegistro', 'viewCaptador'),
('ConsultarDetalleRegistro', 'viewDatosFamiliaresPersonal'),
('ConsultarDetalleRegistro', 'viewDatosSociologicosPersonal'),
('ConsultarDetalleRegistro', 'viewFisionomiaPersonal'),
('ConsultarDetalleRegistro', 'viewOficial'),
('ConsultarDetalleRegistro', 'viewPersonal'),
('ConsultarDetalleRegistro', 'viewUnidadBatallon'),
('ConsultarDetalleRegistro', 'viewUniformePersonal'),
('editUserEmail', 'viewUserEmail'),
('assignRolesToUsers', 'viewUserRoles'),
('Admin', 'viewUsers'),
('assignRolesToUsers', 'viewUsers'),
('changeUserPassword', 'viewUsers'),
('createUsers', 'viewUsers'),
('deleteUsers', 'viewUsers'),
('editUsers', 'viewUsers');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item_group`
--

CREATE TABLE IF NOT EXISTS `auth_item_group` (
  `code` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `auth_item_group`
--

INSERT INTO `auth_item_group` (`code`, `name`, `created_at`, `updated_at`) VALUES
('administracionCaptador', 'Captador', 1475554358, 1475554358),
('administracionOficiales', 'Oficiales', 1475554296, 1475554296),
('administracionPersonal', 'Personal', 1475554308, 1475554308),
('administracionUnidadBatallon', 'Unidad de Batallón', 1475554333, 1475554333),
('userCommonPermissions', 'Permiso común de usuario', 1475551146, 1475553057),
('userManagement', 'Administración de Usuario', 1475551145, 1475553075);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) COLLATE utf8_spanish_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1475551124),
('m140608_173539_create_user_table', 1475551141),
('m140611_133903_init_rbac', 1475551142),
('m140808_073114_create_auth_item_group_table', 1475551142),
('m140809_072112_insert_superadmin_to_user', 1475551143),
('m140809_073114_insert_common_permisison_to_auth_item', 1475551143),
('m141023_141535_create_user_visit_log', 1475551143),
('m141116_115804_add_bind_to_ip_and_registration_ip_to_user', 1475551144),
('m141121_194858_split_browser_and_os_column', 1475551144),
('m141201_220516_add_email_and_email_confirmed_to_user', 1475551145),
('m141207_001649_create_basic_user_permissions', 1475551146);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `confirmation_token` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `superadmin` smallint(6) DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `registration_ip` varchar(15) DEFAULT NULL,
  `bind_to_ip` varchar(255) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `email_confirmed` smallint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `confirmation_token`, `status`, `superadmin`, `created_at`, `updated_at`, `registration_ip`, `bind_to_ip`, `email`, `email_confirmed`) VALUES
(1, 'superadmin', 'K7LLYmvfWvexeYGmXQ-zmPm0Y_isyg81', '$2y$13$83jzIGsusIjWU4dx5IH4I.OB7tln1RpQh.J37GIC46C3t192tOo5W', NULL, 1, 1, 1475551143, 1475551143, NULL, NULL, NULL, 0),
(2, 'profesionales', '6so46tbJfdpxfG6MFd_73dE3H6-Un6jv', '$2y$13$GWscI78Yf8TxMcj3gA1QguMmykNTgPRnbW0rNSP6/zbevK5aFwr5m', NULL, 1, 0, 1475552838, 1475552838, '127.0.0.1', '', '', 0),
(3, 'oficiales', 'SlJV4okzbass_HHDf188J1HKi6dHy79T', '$2y$13$XKEufxrxAPBpHyf/nXyKwO7N.UluXnwaO3R4IbUwTomXGbX9ItoEG', NULL, 1, 0, 1475552874, 1475552874, '127.0.0.1', '', '', 0),
(4, 'jefe_seccion', 'TtnmiAcOIWhznOhvqVlsh99I65Hq-cbF', '$2y$13$Yo0StOGcHVot1xdM7oQ9W.9Gx1LyNRfP6PZg9..CdEyrNeU.9PhXa', NULL, 1, 0, 1475552890, 1475552890, '127.0.0.1', '', '', 0),
(5, 'comandante_unidad', 'RFy7AUgSrMGdlLIAQHPKkrcg3AmWSUL8', '$2y$13$Iqy36wRnJAaILg36Hw.mPudtjWuSoJtPpaz8zzml3Pr3g/n4mJOV6', NULL, 1, 0, 1475552903, 1475621636, '127.0.0.1', '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_visit_log`
--

CREATE TABLE IF NOT EXISTS `user_visit_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(255) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `language` char(2) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `visit_time` int(11) NOT NULL,
  `browser` varchar(30) DEFAULT NULL,
  `os` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=135 ;

--
-- Volcado de datos para la tabla `user_visit_log`
--

INSERT INTO `user_visit_log` (`id`, `token`, `ip`, `language`, `user_agent`, `user_id`, `visit_time`, `browser`, `os`) VALUES
(1, '57f3204178c05', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1475551297, 'Chrome', 'Linux'),
(2, '57f3260d3d9d1', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1475552781, 'Chrome', 'Linux'),
(3, '57f3297c97817', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 5, 1475553660, 'Chrome', 'Linux'),
(4, '57f329a321c90', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1475553699, 'Chrome', 'Linux'),
(5, '57f3398c72ef9', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1475557772, 'Chrome', 'Linux'),
(6, '57f339a17d7cf', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 4, 1475557793, 'Chrome', 'Linux'),
(7, '57f344a9c3ae1', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1475560617, 'Chrome', 'Linux'),
(8, '57f344d46a219', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1475560660, 'Chrome', 'Linux'),
(9, '57f3450277b92', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 4, 1475560706, 'Chrome', 'Linux'),
(10, '57f345c067324', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1475560896, 'Chrome', 'Linux'),
(11, '57f396290ca9d', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1475581481, 'Chrome', 'Linux'),
(12, '57f3a5446efbc', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1475585348, 'Chrome', 'Linux'),
(13, '57f3b690a59a1', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1475589776, 'Chrome', 'Linux'),
(14, '57f3b92f682eb', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1475590447, 'Chrome', 'Linux'),
(15, '57f3c66808e02', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1475593832, 'Chrome', 'Linux'),
(16, '57f3def858b0d', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 3, 1475600120, 'Chrome', 'Linux'),
(17, '57f3df04e0b9c', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1475600132, 'Chrome', 'Linux'),
(18, '57f3ec0d6f4d2', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1475603469, 'Chrome', 'Linux'),
(19, '57f429a910146', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1475619241, 'Chrome', 'Linux'),
(20, '57f433c6938ab', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 3, 1475621830, 'Chrome', 'Linux'),
(21, '57f5af577600e', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1475718999, 'Chrome', 'Linux'),
(22, '57f5aff41d794', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1475719156, 'Chrome', 'Linux'),
(23, '57f5cb52d2aca', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1475726162, 'Chrome', 'Linux'),
(24, '57f5e6a3e213d', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1475733155, 'Chrome', 'Linux'),
(25, '57f5f9994cab9', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1475738009, 'Chrome', 'Linux'),
(26, '57fa3a3506596', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476016693, 'Chrome', 'Linux'),
(27, '57fa3a8437821', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476016772, 'Chrome', 'Linux'),
(28, '57fa3e773dfde', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476017783, 'Chrome', 'Linux'),
(29, '57fa625ec4fbe', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476026974, 'Chrome', 'Linux'),
(30, '57fa64b5ca373', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476027573, 'Chrome', 'Linux'),
(31, '57fa64d71cde7', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476027607, 'Chrome', 'Linux'),
(32, '57fa650bd1919', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476027659, 'Chrome', 'Linux'),
(33, '57fa665bf320f', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476027995, 'Chrome', 'Linux'),
(34, '57fa669b808df', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476028059, 'Chrome', 'Linux'),
(35, '57fa831d52e53', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476035357, 'Chrome', 'Linux'),
(36, '57fa836ce2c19', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476035436, 'Chrome', 'Linux'),
(37, '57fa8a950a08d', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 3, 1476037269, 'Chrome', 'Linux'),
(38, '57fa8acd178f1', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 2, 1476037325, 'Chrome', 'Linux'),
(39, '57fa8af85e030', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 4, 1476037368, 'Chrome', 'Linux'),
(40, '57fa8b0eb3908', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 5, 1476037390, 'Chrome', 'Linux'),
(41, '57fa958817eac', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 5, 1476040072, 'Chrome', 'Linux'),
(42, '57fa95f28cdd3', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 5, 1476040178, 'Chrome', 'Linux'),
(43, '57fa9941d26dd', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 5, 1476041025, 'Chrome', 'Linux'),
(44, '57fa998b6f1b8', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 5, 1476041099, 'Chrome', 'Linux'),
(45, '57fa99b71675f', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476041143, 'Chrome', 'Linux'),
(46, '57fa9a229017f', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476041250, 'Chrome', 'Linux'),
(47, '57fa9a2e809cb', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 5, 1476041262, 'Chrome', 'Linux'),
(48, '57fa9f25599c8', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476042533, 'Chrome', 'Linux'),
(49, '57faa6e8cdf57', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476044520, 'Chrome', 'Linux'),
(50, '57fac985b2213', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476053381, 'Chrome', 'Linux'),
(51, '57fb39eabc5dd', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476082154, 'Chrome', 'Linux'),
(52, '57fb462cdd85a', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476085292, 'Chrome', 'Linux'),
(53, '57fb5f226676e', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476091682, 'Chrome', 'Linux'),
(54, '57fb9c4cdc3e5', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476107340, 'Chrome', 'Linux'),
(55, '57fbaff633dc7', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476112374, 'Chrome', 'Linux'),
(56, '57fbb0189cae5', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 5, 1476112408, 'Chrome', 'Linux'),
(57, '57fbb09741685', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476112535, 'Chrome', 'Linux'),
(58, '57fbb262cd687', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', NULL, 1476112994, 'Chrome', 'Linux'),
(59, '57fbb2805b8e0', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', NULL, 1476113024, 'Chrome', 'Linux'),
(60, '57fbb28aaf140', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476113034, 'Chrome', 'Linux'),
(61, '57fbb2aa725b3', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', NULL, 1476113066, 'Chrome', 'Linux'),
(62, '57fbb79c18934', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476114332, 'Chrome', 'Linux'),
(63, '57fbb7a8082d9', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', NULL, 1476114344, 'Chrome', 'Linux'),
(64, '57fbc1bfba627', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', NULL, 1476116927, 'Chrome', 'Linux'),
(65, '57fbc34b728c4', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476117323, 'Chrome', 'Linux'),
(66, '57fbc36772d9c', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 3, 1476117351, 'Chrome', 'Linux'),
(67, '57fbc381d7d17', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 4, 1476117377, 'Chrome', 'Linux'),
(68, '57fbc50640167', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 5, 1476117766, 'Chrome', 'Linux'),
(69, '57fbc522740d2', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 3, 1476117794, 'Chrome', 'Linux'),
(70, '57fbc72fa6505', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 2, 1476118319, 'Chrome', 'Linux'),
(71, '57fbd349ab0c2', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 2, 1476121417, 'Chrome', 'Linux'),
(72, '57fbd39d95b94', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 2, 1476121501, 'Chrome', 'Linux'),
(73, '57fbd41b4833a', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 2, 1476121627, 'Chrome', 'Linux'),
(74, '57fbd435ca93d', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 2, 1476121653, 'Chrome', 'Linux'),
(75, '57fbdc282815d', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', NULL, 1476123688, 'Chrome', 'Linux'),
(76, '57fbdc47283fd', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 3, 1476123719, 'Chrome', 'Linux'),
(77, '57fbdd8ea9080', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', NULL, 1476124046, 'Chrome', 'Linux'),
(78, '57fbe11a3068d', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 4, 1476124954, 'Chrome', 'Linux'),
(79, '57fbe13c0c5a2', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 5, 1476124988, 'Chrome', 'Linux'),
(80, '57fbe20131e1a', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 4, 1476125185, 'Chrome', 'Linux'),
(81, '57fbe210a9cd7', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 2, 1476125200, 'Chrome', 'Linux'),
(82, '57fbe221d3a7a', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', NULL, 1476125217, 'Chrome', 'Linux'),
(83, '57fbe230cc386', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476125232, 'Chrome', 'Linux'),
(84, '57fbf391c354f', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476129681, 'Chrome', 'Linux'),
(85, '57fbfb39f26d6', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 3, 1476131642, 'Chrome', 'Linux'),
(86, '57fbfbd8877d7', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', NULL, 1476131800, 'Chrome', 'Linux'),
(87, '57fbfcf99b302', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 3, 1476132089, 'Chrome', 'Linux'),
(88, '57fc03e0f2739', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 3, 1476133856, 'Chrome', 'Linux'),
(89, '57fc03f7a2608', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 5, 1476133879, 'Chrome', 'Linux'),
(90, '57fc040ac3a22', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 4, 1476133898, 'Chrome', 'Linux'),
(91, '57fc04a075f97', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', NULL, 1476134048, 'Chrome', 'Linux'),
(92, '57fc04b0a5f41', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476134064, 'Chrome', 'Linux'),
(93, '57fc04c75c3b8', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', NULL, 1476134087, 'Chrome', 'Linux'),
(94, '57fc04d7c47a0', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476134103, 'Chrome', 'Linux'),
(95, '57fc04ec7432b', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', NULL, 1476134124, 'Chrome', 'Linux'),
(96, '57fc0a4530c68', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476135493, 'Chrome', 'Linux'),
(97, '57fc0a9aee873', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476135578, 'Chrome', 'Linux'),
(98, '57fc0abaccd91', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476135610, 'Chrome', 'Linux'),
(99, '57fc0d9142426', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476136337, 'Chrome', 'Linux'),
(100, '57fc0ffa08c35', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476136954, 'Chrome', 'Linux'),
(101, '57fc12726d953', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476137586, 'Chrome', 'Linux'),
(102, '57fc27dd547e9', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476143069, 'Chrome', 'Linux'),
(103, '57fc322142473', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476145697, 'Chrome', 'Linux'),
(104, '57fc3306418cb', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476145926, 'Chrome', 'Linux'),
(105, '57fc56f01065f', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476155120, 'Chrome', 'Linux'),
(106, '57fc5b31d6758', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476156209, 'Chrome', 'Linux'),
(107, '57fc663fdaaa3', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476159039, 'Chrome', 'Linux'),
(108, '57fcbd41520b2', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 3, 1476181313, 'Chrome', 'Linux'),
(109, '57fcbd6146e99', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 5, 1476181345, 'Chrome', 'Linux'),
(110, '57fcbd8add14e', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 4, 1476181386, 'Chrome', 'Linux'),
(111, '57fcbdf726e9b', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 5, 1476181495, 'Chrome', 'Linux'),
(112, '57fcbe6156ee0', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 2, 1476181601, 'Chrome', 'Linux'),
(113, '57fcc0258a3a6', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476182053, 'Chrome', 'Linux'),
(114, '57fcc07fd5280', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', NULL, 1476182143, 'Chrome', 'Linux'),
(115, '57fcc09fefbfe', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476182175, 'Chrome', 'Linux'),
(116, '57fcc0f7a4494', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', NULL, 1476182263, 'Chrome', 'Linux'),
(117, '57fcc106ea6b6', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476182278, 'Chrome', 'Linux'),
(118, '57fcc163be10d', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', NULL, 1476182371, 'Chrome', 'Linux'),
(119, '57fcc1f7bd9e1', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476182519, 'Chrome', 'Linux'),
(120, '57fcfe23c3290', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476197923, 'Chrome', 'Linux'),
(121, '57fcffd23826e', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 4, 1476198354, 'Chrome', 'Linux'),
(122, '57fcffdfe0b0a', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 5, 1476198367, 'Chrome', 'Linux'),
(123, '57fd000cbfda2', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 4, 1476198412, 'Chrome', 'Linux'),
(124, '57fd00f9a2033', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 3, 1476198649, 'Chrome', 'Linux'),
(125, '57fd018467429', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 5, 1476198788, 'Chrome', 'Linux'),
(126, '57fd0279bf1b1', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 4, 1476199033, 'Chrome', 'Linux'),
(127, '57fd0385cc6c7', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 5, 1476199301, 'Chrome', 'Linux'),
(128, '57fd039512d0c', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 4, 1476199317, 'Chrome', 'Linux'),
(129, '57fd03c12b086', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476199361, 'Chrome', 'Linux'),
(130, '57fd04d893519', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 4, 1476199640, 'Chrome', 'Linux'),
(131, '57fd07a293513', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476200354, 'Chrome', 'Linux'),
(132, '57fd084635613', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 4, 1476200518, 'Chrome', 'Linux'),
(133, '57fd0877d1f66', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 1, 1476200567, 'Chrome', 'Linux'),
(134, '57fd088d76fe1', '127.0.0.1', 'es', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36', 4, 1476200589, 'Chrome', 'Linux');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_assignment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_auth_item_group_code` FOREIGN KEY (`group_code`) REFERENCES `auth_item_group` (`code`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `user_visit_log`
--
ALTER TABLE `user_visit_log`
  ADD CONSTRAINT `user_visit_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
