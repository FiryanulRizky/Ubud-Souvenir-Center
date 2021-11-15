package com.example.ubudsouvenircenter

import android.annotation.SuppressLint
import android.content.Intent
import android.os.Bundle
import android.view.Menu
import android.view.MenuItem
import android.webkit.*
import android.widget.Toast
import androidx.appcompat.app.AlertDialog
import androidx.appcompat.app.AppCompatActivity
import com.example.ubud_souvenir_center.MainActivity
import com.example.ubud_souvenir_center.MenuAdmin1
import com.example.ubud_souvenir_center.R
import com.example.ubud_souvenir_center.ScanActivity
import com.example.ubud_souvenir_center.databinding.ActivityLogoutBinding

@Suppress("DEPRECATION", "NAME_SHADOWING")
class Logout : AppCompatActivity() {
    @SuppressLint("SetJavaScriptEnabled")
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        val binding = ActivityLogoutBinding.inflate(layoutInflater)
        setContentView(binding.root)

        binding.kemenu.setOnClickListener {
            val kemenu = Intent(this@Logout, MenuAdmin1::class.java)
            startActivity(kemenu)
        }

        val activity = this
        val logout = binding.logout
        logout.webChromeClient = object : WebChromeClient() {

            override fun onJsAlert(view: WebView, url: String, message: String, result: JsResult): Boolean {
                AlertDialog.Builder(activity)
                    .setTitle("Peringatan !!")
                    .setMessage(message)
                    .setPositiveButton(android.R.string.ok) { _, _ -> result.confirm() }.setCancelable(false).create().show()
                return true
            }

            override fun onJsConfirm(view: WebView, url: String, message: String, result: JsResult): Boolean {
                AlertDialog.Builder(activity)
                    .setTitle("Konfirmasi")
                    .setMessage(message)
                    .setPositiveButton(android.R.string.ok) { _, _ -> result.confirm() }
                    .setNegativeButton(android.R.string.cancel) { _, _ -> result.cancel() }.setCancelable(false).create().show()
                return true
            }

            override fun onReceivedTitle(view: WebView?, logout: String?) {
                window.setTitle(logout)
            }

            override fun onProgressChanged(load : WebView, newProgress : Int) {
                if (newProgress == 100) {
                    val load = binding.headerlogout
                    load.loadUrl("file:///android_asset/blank.html")
                } else {
                    val load = binding.headerlogout
                    load.loadUrl("file:///android_asset/load_gif.html")
                }
            }
        }
        logout.webViewClient = object : WebViewClient() {
            override fun shouldOverrideUrlLoading(view: WebView, url: String): Boolean {
                view.loadUrl(url)
                return false
            }

            override fun onReceivedError(view: WebView, errorCode: Int, description: String, failingUrl: String) {
                val masalahkoneksi = binding.logout
                masalahkoneksi.webViewClient = object : WebViewClient() {
                    override fun shouldOverrideUrlLoading(view: WebView, url: String): Boolean {
                        view.loadUrl(url)
                        return false
                    }
                }
                masalahkoneksi.loadUrl("file:///android_asset/koneksi_else.html")
                val halamanlogin = Intent(this@Logout, LoginRegister::class.java)
                startActivity(halamanlogin)
            }
        }
        logout.loadUrl("https://ubud-souvenir-center.my.id/android/1_login_reg/konfirmasi_logout.php")
        logout.settings.javaScriptEnabled=true
        logout.settings.allowContentAccess=true
        logout.settings.domStorageEnabled=true
        logout.settings.loadWithOverviewMode=true
        logout.scrollBarStyle= WebView.SCROLLBARS_INSIDE_OVERLAY
        logout.isScrollbarFadingEnabled=true
        logout.isVerticalScrollBarEnabled=true
        logout.settings.builtInZoomControls=true
        logout.settings.javaScriptCanOpenWindowsAutomatically=true
    }

    override fun onCreateOptionsMenu(menu: Menu): Boolean {
        menuInflater.inflate(R.menu.options_logout, menu)
        return true
    }

    override fun onOptionsItemSelected(item: MenuItem): Boolean {
        return when (item.itemId) {
            R.id.menu1 -> {
                val kemenu1 = Intent(this@Logout, MainActivity::class.java)
                startActivity(kemenu1)
                true
            }
            R.id.tutup_logout -> {
                android.app.AlertDialog.Builder(this).setIcon(android.R.drawable.ic_dialog_alert)
                    .setTitle("Konfirmasi").setMessage("Yakin ingin menutup aplikasi ?")
                    .setPositiveButton("YA"
                    ) { _, _ ->
                        finishAffinity()
                        Toast.makeText(this@Logout, "Aplikasi Ditutup", Toast.LENGTH_SHORT).show()
                    }.setNegativeButton("TIDAK", null).show()
                true
            }
            else -> super.onOptionsItemSelected(item)
        }
    }
}