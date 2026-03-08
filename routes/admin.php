<?php

use App\Livewire\Admin\AccountManagement;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\LiveChats;
use App\Livewire\Admin\Notification;
use App\Livewire\Admin\Reports;
use App\Livewire\Admin\SupportTickets;
use App\Livewire\Admin\SystemNotifications;
use App\Livewire\Admin\SystemSettings;
use App\Livewire\Admin\Transactions;
use App\Livewire\Admin\UserManagement;
use Illuminate\Support\Facades\Route;




Route::middleware("web","auth:admin","admin.online.offline.indicators")->prefix("admins")->group(function(){

  Route::get("dashboard", Dashboard::class)->name("admin.dashboard");
  Route::get("userManagement", UserManagement::class)->name("admin.users");
  Route::get("accountManagement", AccountManagement::class)->name("admin.accounts");
  Route::get("transections", Transactions::class)->name("admin.transactions");
  Route::get("supportTickets", SupportTickets::class)->name("admin.support");
  Route::get("systemNotifications", SystemNotifications::class)->name("admin.notifications");
  Route::get("systemSettings", SystemSettings::class)->name("admin.settings");
  Route::get("reports", Reports::class)->name("admin.reports");
  Route::get("liveChats", LiveChats::class)->name("admin.chats");
  // Route::get("notifications", Notification::class)->name("admin.notifications");
  
});