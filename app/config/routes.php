<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'Dashboard/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


/* Report:START */
$route["reports"]["POST"] = "Report/action";
$route["reports/general"]["GET"] = "Report/general";
$route["reports/general"]["POST"] = "Report/generalPost";
$route["reports/product"]["GET"] = "Report/product";
$route["reports/product"]["POST"] = "Report/productPost";
$route["reports/trial-product"]["GET"] = "Report/trialProduct";
$route["reports/trial-product"]["POST"] = "Report/trialProductPost";
$route["reports/staff"] = "Report/staff";
$route["reports/sale"] = "Report/sale";
/* Report:END */

/* Ajax:START */
$route["ajax/announcement"] = "Announcement/view";
$route["ajax/dashReportOne"] = "Ajax/dashReportsOne";
$route["ajax/dashReportTwo"] = "Ajax/dashReportsTwo";
/* Ajax:END */

/* User:START */
$route["auth/login"]["GET"] = "User/login";
$route["auth/login"]["POST"] = "User/loginPost";
$route["auth/logout"]["GET"] = "User/signOut";
$route["change-theme"]["POST"] = "User/changeTheme";
$route["users"]["GET"] = "User/list";
$route["users"]["POST"] = "User/action";
$route["users/(:num)"]["GET"] = "User/details/$1";
$route["users/add"]["POST"] = "User/add";
/* User:END */

/* Role:START */
$route["roles"]["GET"] = "Role/list";
$route["roles/add"]["POST"] = "Role/add";
$route["roles/update"]["POST"] = "Role/update";
$route["roles/find"]["POST"] = "Role/find";
$route["roles/delete"]["POST"] = "Role/delete";
$route["roles/(:num)"]["GET"] = "Role/details/$1";
/* Role:END */

/* Customers:START */
$route["customers"]["GET"] = "Customer/list";
$route["customers/(:num)"]["GET"] = "Customer/details/$1";
$route["customers"]["POST"] = "Customer/action";
$route["customers/ajax"]["POST"] = "Customer/ajax";
$route["customers/search"]["POST"] = "Customer/search";
/* Customers:END */

/* Suppliers:START */
$route["suppliers"]["GET"] = "Supplier/list";
$route["suppliers/(:num)"]["GET"] = "Supplier/details/$1";
$route["suppliers"]["POST"] = "Supplier/action";
$route["suppliers/ajax"]["POST"] = "Supplier/ajax";
$route["suppliers/search"]["POST"] = "Supplier/search";
/* Suppliers:END */

/* Brand:START */
$route["brands"]["GET"] = "Brand/list";
$route["brands"]["POST"] = "Brand/action";
/* Brand:END */

/* ProductType:START */
$route["product-types"]["GET"] = "ProductType/list";
$route["product-types"]["POST"] = "ProductType/action";
/* ProductType:END */

/* ProductPack:START */
$route["product-packs"]["GET"] = "ProductPack/list";
$route["product-packs"]["POST"] = "ProductPack/action";
/* ProductPack:END */

/* ProductFluidity:START */
$route["product-fluidities"]["GET"] = "ProductFluidity/list";
$route["product-fluidities"]["POST"] = "ProductFluidity/action";
/* ProductFluidity:END */

/* CustomerGroup:START */
$route["customer-groups"]["GET"] = "CustomerGroup/list";
$route["customer-groups"]["POST"] = "CustomerGroup/action";
/* CustomerGroup:END */

/* CustomerSource:START */
$route["customer-sources"]["GET"] = "CustomerSource/list";
$route["customer-sources"]["POST"] = "CustomerSource/action";
/* CustomerSource:END */

/* Sector:START */
$route["sectors"]["GET"] = "Sector/list";
$route["sectors"]["POST"] = "Sector/action";
/* Sector:END */

/* Config:START */
$route["settings"]["GET"] = "Config/view";
$route["settings"]["POST"] = "Config/update";
/* Config:END */

/* District:START */
$route["districts/search"]["POST"] = "District/search";
/* District:END */

/* Country:START */
$route["countries/search"]["POST"] = "Country/search";
/* Country:END */

/* Account:START */
$route["accounts"]["GET"] = "Account/list";
$route["accounts/(:num)"]["GET"] = "Account/details/$1";
$route["accounts"]["POST"] = "Account/action";
/* Account:END */

/* Product:START */
$route["products"]["GET"] = "Product/list";
$route["products"]["search"] = "Product/search";
$route["products"]["POST"] = "Product/action";
$route["stack-activities"]["GET"] = "Product/stackActivities";
/* Product:END */

/* Sale:START */
$route["sales/create"]["GET"] = "Sale/add";
$route["sales/(:num)"]["GET"] = "Sale/edit/$1";
$route["sales/(:num)/view"]["GET"] = "Sale/view/$1";
$route["sales"]["GET"] = "Sale/list";
$route["sales"]["POST"] = "Sale/action";
$route["sales/ajax"]["POST"] = "Sale/ajax";
$route["sales/(:num)/madeOffer"]["GET"] = "Sale/madeOffer/$1";
$route["sales/(:num)/sendOffer"]["POST"] = "Sale/sendOffer/$1";
/* Sale:END */

/* Expense:START */
$route["expenses/create"]["GET"] = "Expense/add";
$route["expenses/(:num)"]["GET"] = "Expense/edit/$1";
$route["expenses/(:num)/view"]["GET"] = "Expense/view/$1";
$route["expenses"]["GET"] = "Expense/list";
$route["expenses"]["POST"] = "Expense/action";
$route["expenses/ajax"]["POST"] = "Expense/ajax";
/* Expense:END */

/* Collect:START */
$route["collects/ajax"]["POST"] = "Collect/ajax";
$route["collects"]["POST"] = "Collect/action";
/* Collect:END */

/* Collect:START */
$route["payments/ajax"]["POST"] = "Payment/ajax";
$route["payments"]["POST"] = "Payment/action";
/* Collect:END */

$route["documents/ajax"]["POST"] = "Document/ajax";
$route["documents"]["POST"] = "Document/action";
$route["documents/download/(:any)/(:num)"]["GET"] = "Document/download/$1/$2";

$route["notes/ajax"]["POST"] = "Note/ajax";
$route["notes"]["POST"] = "Note/action";

$route["saleExpenses/ajax"]["POST"] = "SaleExpense/ajax";
$route["saleExpenses"]["POST"] = "SaleExpense/action";

$route["trial-products/ajax"]["POST"] = "TrialProduct/ajax";
$route["trial-products/ajaxGeneral"]["POST"] = "TrialProduct/ajaxGeneral";
$route["trial-products"]["POST"] = "TrialProduct/action";
$route["trial-products"]["GET"] = "TrialProduct/index";

$route["logs/ajax"]["POST"] = "ActivityLog/ajax";

$route["sale-statuses"]["GET"] = "Status/saleStatus";

/* Announcement:START */
$route["duyuru-yonetimi"]["GET"] = "Announcement/list";
$route["duyuru-yonetimi"]["POST"] = "Announcement/action";
/* Announcement:END */

/* Mission:START */
$route["missions"]["GET"] = "Mission/list";
$route["missions/add"]["GET"] = "Mission/add";
$route["missions"]["POST"] = "Mission/action";
$route["missions/ajax"]["POST"] = "Mission/ajax";
$route["missions/(:num)"]["GET"] = "Mission/edit/$1";
/* Mission:END */

/* Calendar:START */
$route["calendar"]["GET"] = "Calendar/redirect";
$route["calendar/(:num)"]["GET"] = "Calendar/index/$1";
$route["calendar"]["POST"] = "Calendar/action";
/* Calendar:END */
