@file:Suppress("DEPRECATION")

package com.example.ubudsouvenircenter.notifikasi

import android.app.NotificationManager
import android.app.PendingIntent
import android.content.Context
import android.content.Intent
import android.media.RingtoneManager
import android.net.Uri
import android.os.Build
import android.util.Log
import androidx.annotation.RequiresApi
import androidx.core.app.NotificationCompat
import com.example.ubud_souvenir_center.R
import com.example.ubudsouvenircenter.CekOrder
import com.google.firebase.messaging.Constants.MessageNotificationKeys.TAG
import com.google.firebase.messaging.FirebaseMessaging
import com.google.firebase.messaging.FirebaseMessagingService
import com.google.firebase.messaging.RemoteMessage

@Suppress("DEPRECATION")
class NotifikasiFcm : FirebaseMessagingService() {
    private val CHANNELID = "101"
    @RequiresApi(Build.VERSION_CODES.M)
    override fun onMessageReceived(p0: RemoteMessage) {

        if (p0.data.isNotEmpty()) {
            Log.d(TAG, "Message data payload: ${p0.data}")
        }

        p0.notification?.let {
            Log.d(TAG, "Message Notification Body: ${it.body}")
            if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.N) {
                sendNotification(it.title as String, it.body as String)
            }
        }
    }

    override fun onNewToken(p0: String) {
        super.onNewToken(p0)
        FirebaseMessaging.getInstance().token.addOnCompleteListener { task ->
            if (task.isSuccessful) {
                Log.d("Installations", "token Anda: " + task.result)
//                val textView = findViewById<View>(R.id.token) as TextView
//                textView.text = task.toString()
                FirebaseMessaging.getInstance().subscribeToTopic("kode_order")
            } else {
                Log.e("Installations", "Gagal mendapatkan token")
            }
        }
    }

    @RequiresApi(Build.VERSION_CODES.N)
    private fun sendNotification(messageTitle: String, messageBody: String) {
            val importance = NotificationManager.IMPORTANCE_HIGH
            val defaultSoundUri: Uri = RingtoneManager.getDefaultUri(RingtoneManager.TYPE_NOTIFICATION)
            NotificationCompat.Builder(this, CHANNELID)
            val intent1 = Intent(applicationContext, CekOrder::class.java)
            val pendingIntent = PendingIntent.getActivity(applicationContext, 123, intent1, PendingIntent.FLAG_UPDATE_CURRENT)
        val notificationBuilder = NotificationCompat.Builder(applicationContext,CHANNELID)
                .setSmallIcon(R.drawable.ic_favorite)
                .setChannelId(CHANNELID)
                .setContentTitle(messageTitle)
                .setAutoCancel(true).setContentIntent(pendingIntent)
                .setColor(255)
                .setSound(defaultSoundUri)
                .setPriority(importance)
                .setContentText(messageBody)
                .setWhen(System.currentTimeMillis())
            val notificationManager: NotificationManager =
                getSystemService(Context.NOTIFICATION_SERVICE) as NotificationManager
            notificationManager.notify(0, notificationBuilder.build())
        }
    }