<?php

/* 
 * Copyright (C) 2020 j
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace FacturaScripts\Plugins\DarkMode\Controller;

use FacturaScripts\Core\Base\Controller;

class DarkMode extends Controller
{
    
    public function getPageData()
    {
        $pageData = parent::getPageData();
        $pageData['menu'] = 'admin';
        $pageData['title'] = 'DarkMode';
        $pageData['icon'] = 'fas fa-moon';
        $pageData['showonmenu'] = false;

        return $pageData;
    }

    public function privateCore(&$response, $user, $permissions)
    {
        parent::privateCore($response, $user, $permissions);
        
        $this->setTemplate(false);
        
        //save new state in db for the current user (sent via ajax on every toggle press)
        $newState = $this->request->query->get('saveDarkModeState');
        if ($newState == 'on' OR $newState == 'off'){
            $appSettings = $this->toolBox()->appSettings();
            $appSettings->set('darkModePrefs', $this->user->nick, $newState);
            $appSettings->save();
            exit("ok");
        }else{
            exit("ko");
        }
    }
}