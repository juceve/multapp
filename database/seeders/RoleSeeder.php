<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'Administrador']);
        $role1 = Role::create(['name' => 'Usuario']);

        Permission::create(['name' => 'home.sancionesdia', 'grupo' => 'RESUMEN DIARIO', 'descripcion' => 'Sanciones del día'])->assignRole([$role, $role1]);

        Permission::create(['name' => 'users.index', 'grupo' => 'USUARIOS', 'descripcion' => 'Ver Listado'])->assignRole([$role]);
        Permission::create(['name' => 'users.create', 'grupo' => 'USUARIOS', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'users.edit', 'grupo' => 'USUARIOS', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'users.destroy', 'grupo' => 'USUARIOS', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'admin.roles.index',  'grupo' => 'ROLES', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        Permission::create(['name' => 'admin.roles.create',  'grupo' => 'ROLES', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'admin.roles.edit',  'grupo' => 'ROLES', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'admin.roles.destroy',  'grupo' => 'ROLES', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'admin.sanciones.index',  'grupo' => 'SANCIONES', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        Permission::create(['name' => 'admin.sanciones.create',  'grupo' => 'SANCIONES', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'admin.sanciones.edit',  'grupo' => 'SANCIONES', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'admin.sanciones.destroy',  'grupo' => 'SANCIONES', 'descripcion' => 'Eliminar y Anular'])->assignRole([$role]);
        Permission::create(['name' => 'admin.sanciones.boletas',  'grupo' => 'SANCIONES', 'descripcion' => 'Genera Boletas'])->assignRole([$role]);
        Permission::create(['name' => 'admin.sanciones.cobrar',  'grupo' => 'SANCIONES', 'descripcion' => 'Realiza Cobros'])->assignRole([$role]);

        Permission::create(['name' => 'admin.reportes',  'grupo' => 'REPORTES', 'descripcion' => 'Ver listado'])->assignRole([$role]);

        Permission::create(['name' => 'admin.casetas.index',  'grupo' => 'CASETAS', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        Permission::create(['name' => 'admin.casetas.create',  'grupo' => 'CASETAS', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'admin.casetas.edit',  'grupo' => 'CASETAS', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'admin.casetas.destroy',  'grupo' => 'CASETAS', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'admin.socios.index',  'grupo' => 'SOCIOS', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        Permission::create(['name' => 'admin.socios.create',  'grupo' => 'SOCIOS', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'admin.socios.edit',  'grupo' => 'SOCIOS', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'admin.socios.destroy',  'grupo' => 'SOCIOS', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'admin.causales.index',  'grupo' => 'CAUSAS SACIÓN', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        Permission::create(['name' => 'admin.causales.create',  'grupo' => 'CAUSAS SACIÓN', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'admin.causales.edit',  'grupo' => 'CAUSAS SACIÓN', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'admin.causales.destroy',  'grupo' => 'CAUSAS SACIÓN', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'admin.tipopagos.index',  'grupo' => 'TIPO PAGOS', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        Permission::create(['name' => 'admin.tipopagos.create',  'grupo' => 'TIPO PAGOS', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'admin.tipopagos.edit',  'grupo' => 'TIPO PAGOS', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'admin.tipopagos.destroy',  'grupo' => 'TIPO PAGOS', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'admin.sistemas.index',  'grupo' => 'DATOS SISTEMA', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        // Permission::create(['name' => 'admin.sistemas.create',  'grupo' => 'DATOS SISTEMA', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'admin.sistemas.edit',  'grupo' => 'DATOS SISTEMA', 'descripcion' => 'Editar'])->assignRole([$role]);
        // Permission::create(['name' => 'admin.sistemas.destroy',  'grupo' => 'DATOS SISTEMA', 'descripcion' => 'Eliminar'])->assignRole([$role]);
    }
}
