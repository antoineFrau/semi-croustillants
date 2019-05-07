<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class AffinityController extends Controller
{
  private $_affinityDegree = 0;
  //private $_currentUser = new User();
  private $_currentUser;
  private $_users ;
  private $_usersWithAffinity;


  public function generate()
  {
      $activities = null;
      $_usersWithAffinity = array();
      //$_currentUser = JWTAuth::parseToken()->authenticate(); //current user
      $_currentUser = User::first(); //c'était pour test
      $activitiesOfCurrentUser = $_currentUser->activities()->get();
      $_users = User::where('postal_code', $_currentUser->postal_code)->get();
      $_users = User::where([
        ['postal_code', $_currentUser->postal_code],
        ['id','<>',$_currentUser->id] //amélioration: éviter de mettre une condition et utiliser une fonction qui retirera l'élément de la liste directement
      ])->get(); //Users' list with same postal_code as the current user
      foreach($_users as $user){
        $_affinityDegree = 1;
        $activitiesUser = $user->activities()->get();
        $activitiesCUser = $_currentUser->activities()->get();
        if(!empty($activitiesUser) && !empty($activitiesCUser)){
          foreach ($activitiesCUser as $activityCU){
            foreach ($activitiesUser as $activityU) {
              if((int)$activityCU->id == (int)$activityU->id){
                $_affinityDegree ++;
              }
            }
          }
        }
        $user->affinityDegree = $_affinityDegree;
        //$_usersWithAffinity->append($user);
        array_push($_usersWithAffinity, $user);

      }

      return $_usersWithAffinity;
  }

}
