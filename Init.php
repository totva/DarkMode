<?php
namespace FacturaScripts\Plugins\DarkMode;

use FacturaScripts\Core\Base\InitClass;

class Init extends InitClass
{
	public function init()
    {
        /// código a ejecutar cada vez que carga FacturaScripts (si este plugin está activado).
    }

    public function update()
    {
        /// código a ejecutar cada vez que se instala o actualiza el plugin
        $this->toolBox()->i18nLog()->info(
            '<i class="fas fa-adjust" aria-hidden="true"></i>'
            .' Icono creado arriba a la derecha, junto a buscar <i class="fas fa-search" aria-hidden="true"></i>'
        );
    }
}