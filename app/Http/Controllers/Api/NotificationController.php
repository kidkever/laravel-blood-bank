<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\Clientables;
use App\Models\Governorate;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function getAllNotifications(Request $request)
    {
        // paginated
        return responseJson(1, 'success', $request->user()->notifications);
    }

    public function updateReadNotification(Request $request, $id)
    {
        $request->validate([
            'is_read' => 'required|Boolean'
        ]);

        $notification = $request->user()->notifications()->find($id);
        $notification->pivot->is_read = $request->is_read;
        $notification->save();

        return responseJson(1, 'success', $notification);
    }

    public function getNotificationSettings(Request $request)
    {
        // $userId = $request->user()->id;
        // $bloodTypes = Clientables::where('client_id', $userId)->where('clientable_type', 'App\Models\BloodType')->get();
        // $governorates = Clientables::where('client_id', $userId)->where('clientable_type', 'App\Models\Governorate')->get();

        $notificationSettings = [
            // 'choosenBloodTypes' => $bloodTypes,
            // 'choosenGovernorates' => $governorates
            'choosenBloodTypes' => $request->user()->bloodTypes->pluck('id'),
            'choosenGovernorates' => $request->user()->governorates->pluck('id')
        ];

        return responseJson(1, 'success', $notificationSettings);
    }

    public function updateNotificationSettings(Request $request)
    {
        $user = $request->user();

        if ($request->has('governorates')) {
            $governorate_ids = Governorate::whereIn('name', $request->governorates)->pluck('id');

            $user->governorates()->detach();
            $user->governorates()->attach($governorate_ids);
        }

        if ($request->has('bloodTypes')) {
            $bloodType_ids = BloodType::whereIn('name', $request->bloodTypes)->pluck('id');

            $user->bloodTypes()->detach();
            $user->bloodTypes()->attach($bloodType_ids);
        }

        return responseJson(1, 'تم تعديل اعدادات الاشعارات بنجاح');
    }
}
