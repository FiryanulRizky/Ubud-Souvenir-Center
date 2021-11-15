package com.example.ubud_souvenir_center

import android.content.Intent
import android.content.IntentFilter
import android.os.Bundle
import android.view.Menu
import android.view.MenuItem
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import com.example.ubud_souvenir_center.databinding.ActivityStatusDiskoneksiBinding
import com.example.ubudsouvenircenter.LoginRegister

class StatusDiskoneksi : AppCompatActivity(),HandleKoneksi.ConnectionChangeCallback {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)

        val intentFilter = IntentFilter("android.net.conn.CONNECTIVITY_CHANGE")

        val networkChangeReceiver = HandleKoneksi()

        registerReceiver(networkChangeReceiver, intentFilter)

        networkChangeReceiver.setConnectionChangeCallback(this)

        val binding = ActivityStatusDiskoneksiBinding.inflate(layoutInflater)
        setContentView(binding.root)
        val diskonek = binding.diskoneksi2
        diskonek.loadUrl("file:///android_asset/koneksi.html")
    }

    override fun onCreateOptionsMenu(menu: Menu): Boolean {
        menuInflater.inflate(R.menu.options_main_ecomm, menu)
        return true
    }

    override fun onOptionsItemSelected(item: MenuItem): Boolean {
        return when (item.itemId) {
            R.id.close_main -> {
                android.app.AlertDialog.Builder(this).setIcon(android.R.drawable.ic_dialog_alert)
                    .setTitle("Closing Confirmation").setMessage("Sure you want to close this App ?")
                    .setPositiveButton("Yes"
                    ) { _, _ ->
                        finishAffinity()
                        Toast.makeText(
                            this@StatusDiskoneksi,
                            "Ubud Souvenir Center Closed",
                            Toast.LENGTH_SHORT
                        ).show()
                    }.setNegativeButton("No", null).show()
                true
            }
            else -> super.onOptionsItemSelected(item)
        }
    }

    override fun onConnectionChange(isConnected: Boolean) {
        if (isConnected) {
            val intent = Intent(this@StatusDiskoneksi, LoginRegister::class.java)
            startActivity(intent)
        }
    }
}