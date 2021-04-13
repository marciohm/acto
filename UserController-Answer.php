<?php

/** ANSWER
 *
 * In this case we could just call the method update (in case of using a ORM lib like Eloquent or Doctrine), passing as parameter the request
 * In this case the form does not need two fields to manage the user status. We just need a checkbox field called "active"
 *
 **/

class UserController {
	public function update(Request $request) {
		if ($user->isAdmin()) {
			$user = User::find($request->get('user_id'));
			$user->update($request->all());
			return redirect()->back();
		} else {
			abort(400, “youdonothaveaccess”);
		}
	}
}