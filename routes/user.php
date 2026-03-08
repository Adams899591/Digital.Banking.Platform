<?php

use App\Livewire\User\Accounts;
use App\Livewire\User\Cards;
use App\Livewire\User\Dashboard;
use App\Livewire\User\Notification;
use App\Livewire\User\ProfileAndSecurity;
use App\Livewire\User\Statements;
use App\Livewire\User\SupportCenters;
use App\Livewire\User\Transfers;
use Illuminate\Support\Facades\Route;



Route::middleware(["auth", "online.offline.indicators"])->prefix("users")->group(function(){

  Route::get("dashboard", Dashboard::class)->name("user.dashboard");
  Route::get("accounts", Accounts::class)->name("user.accounts");
  Route::get("transfers", Transfers::class)->name("user.transfers");
  Route::get("statements", Statements::class)->name("user.statements");
  Route::get("cards", Cards::class)->name("user.cards");
  Route::get("profileAndSecurity", ProfileAndSecurity::class)->name("user.profileAndSecurity");
  Route::get("supportCenters", SupportCenters::class)->name("user.supportCenters");
  Route::get("notifications", Notification::class)->name("user.notifications");

});