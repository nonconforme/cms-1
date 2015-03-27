<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
/*
	(c) MaxSite CMS, http://max-3000.com/
*/
?>

<div class="MainMenu"><div class="wrap">
	<nav><ul class="menu menu_responsive">
	
		<?php

			$menu = mso_get_option('top_menu', 'templates', tf('/ | Главная ~ about | О сайте ~ comments | Комментарии ~ contact | Контакты ~ sitemap | Архив ~ feed | RSS'));
			
			if (is_login())
			{
				$menu .= NR . '[';
				$menu .= NR . 'admin | ' . getinfo('users_nik') . ' | Админ-панель | | i-user';
				$menu .= NR . 'admin/page_new | Создать запись';
				$menu .= NR . 'admin/page | Список записей';
				$menu .= NR . 'admin/cat | Рубрики';
				$menu .= NR . 'admin/plugins | Плагины';
				$menu .= NR . 'admin/files | Загрузки';
				$menu .= NR . 'admin/sidebars | Сайдбары';
				$menu .= NR . 'admin/options | Основные настройки';
				$menu .= NR . 'admin/template_options | Настройка шаблона';
				$menu .= NR . '---';
				$menu .= NR . 'http://max-3000.com/page/faq | ЧАВО для новичков';
				$menu .= NR . 'http://max-3000.com/help | Центр помощи';
				$menu .= NR . 'http://forum.max-3000.com/ | Форум поддержки';
				
				if (function_exists('ushka')) 
				{
					$menu .= NR . ushka('main-menu-admin');
				}
				
				$menu .= NR . '---';
				$menu .= NR . 'logout | Выход | | icon logout';
				
				$menu .= NR . ']';
			}
			elseif (is_login_comuser())
			{
				$comuser = is_login_comuser();
				
				$menu .= NR . '[';
				
				if ($comuser['comusers_nik'])
					$menu .= NR . '# | ' . $comuser['comusers_nik'];
				else
					$menu .= NR . '# | Ваши ссылки';
				
				$menu .= NR . 'users/' . $comuser['comusers_id'] . ' | Своя страница | | i-user';
				
				$menu .= mso_hook('main_menu_add_comuser');
				
				$menu .= NR . '---';
				$menu .= NR . 'logout | Выход';
				$menu .= NR . ']';

			}

			if ($menu) echo mso_menu_build($menu, 'selected', false);
		?>
	</ul></nav>
</div></div><!-- div.wrap div.MainMenu -->
