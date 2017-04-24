{{--
    recruitment from[POST]
    $recruitment = new \App\Models\Recruitment;
    $recruitment->name = $request->name;
    $recruitment->gender = $request->gender;
    $recruitment->birthday = $request->birthday;
    $recruitment->school_name = $request->school_name;
    $recruitment->qq = $request->qq;
    $recruitment->phone = $request->phone;
    $recruitment->email = $request->email;
    $recruitment->introduction = $request->introduction;
    $recruitment->expectation = $request->expectation;
    $recruitment->skill = $request->skill;
    $recruitment->save();
    action:route(index:action)
--}}
