package com.example.ubud_souvenir_center

import android.content.BroadcastReceiver
import android.content.Context
import android.content.Intent
import android.net.ConnectivityManager

@Suppress("DEPRECATION")
class HandleKoneksi : BroadcastReceiver() {
    private var connectionChangeCallback: ConnectionChangeCallback? = null

    override fun onReceive(context: Context, intent: Intent?) {
        val cm = context
            .getSystemService(Context.CONNECTIVITY_SERVICE) as ConnectivityManager
        val activeNetwork = cm.activeNetworkInfo
        val isConnected = (activeNetwork != null
                && activeNetwork.isConnectedOrConnecting)
        if (connectionChangeCallback != null) {
            connectionChangeCallback!!.onConnectionChange(isConnected)
        }
    }

    fun setConnectionChangeCallback(connectionChangeCallback: ConnectionChangeCallback?) {
        this.connectionChangeCallback = connectionChangeCallback
    }

    interface ConnectionChangeCallback {
        fun onConnectionChange(isConnected: Boolean)
    }
}