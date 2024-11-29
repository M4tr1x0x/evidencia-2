# Evidencia 3 - Desarrollo de Aplicación Web

## Descripción
Este proyecto es una aplicación web desarrollada con Laravel 8 que automatiza procesos internos para la gestión de usuarios y órdenes en una empresa distribuidora de materiales. Se implementan funcionalidades para administrar el ciclo de vida de las órdenes, la gestión de usuarios con roles asignados y la subida de evidencia fotográfica.

## Requisitos Previos
- PHP >= 7.4
- Composer
- MySQL o cualquier base de datos compatible
- Laravel 8

## Funcionalidades

### Usuarios
- **Listado de Usuarios**: Permite visualizar todos los usuarios registrados.
- **Creación de Usuarios**: Opción para crear usuarios y asignar roles según el departamento.
- **Edición de Usuarios**: Actualización de información personal y rol asignado.
- **Eliminación de Usuarios**: Desactivación de usuarios de manera lógica.

### Órdenes
- **Gestión Completa del Ciclo de Vida de Órdenes**:
  - Creación de órdenes con datos como número de factura, datos fiscales, dirección de entrega y notas.
  - Cambios de estado de las órdenes: `Ordered`, `In Process`, `In Route`, y `Delivered`.
- **Evidencia Fotográfica**:
  - Subida de fotos durante el estado `In Route` (foto del material cargado) y `Delivered` (foto del material entregado).
- **Listados**:
  - Listado general de todas las órdenes, ordenadas por fecha.
  - Listado de órdenes archivadas con posibilidad de restauración.
- **Búsqueda de Órdenes**:
  - Filtrado por número de factura, cliente, fecha o estado.

### Roles y Permisos
- **Roles Definidos**:
  - `Sales`: Creación de órdenes.
  - `Warehouse`: Gestión de inventario y preparación de pedidos.
  - `Route`: Subida de evidencia fotográfica.
  - `Admin`: Gestión de usuarios y supervisión general.

### Seguridad y Flujo
- Autenticación requerida para acceder al dashboard administrativo.
- Eliminación lógica de órdenes para mantener un historial completo.

