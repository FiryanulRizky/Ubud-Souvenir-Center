package com.example.ubud_souvenir_center

import android.annotation.SuppressLint
import android.content.Intent
import android.content.IntentFilter
import android.os.Bundle
import android.view.Menu
import android.view.MenuItem
import android.webkit.WebChromeClient
import android.webkit.WebView
import android.webkit.WebViewClient
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import com.example.ubud_souvenir_center.databinding.ActivityMenuadmin1Binding
import com.example.ubudsouvenircenter.*

class MenuAdmin1 : AppCompatActivity(), HandleKoneksi.ConnectionChangeCallback {

    @SuppressLint("SetJavaScriptEnabled")
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        val binding = ActivityMenuadmin1Binding.inflate(layoutInflater)
        setContentView(binding.root)

        val intentFilter = IntentFilter("android.net.conn.CONNECTIVITY_CHANGE")

        val networkChangeReceiver = HandleKoneksi()

        registerReceiver(networkChangeReceiver, intentFilter)

        networkChangeReceiver.setConnectionChangeCallback(this)

        binding.infoToko.setOnClickListener {
            val infotoko = Intent(this@MenuAdmin1, InformasiToko2::class.java)
            startActivity(infotoko)
        }
        binding.kelolaProduk.setOnClickListener {
            val kelolaproduk = Intent(this@MenuAdmin1, KelolaProduk3::class.java)
            startActivity(kelolaproduk)
        }
        binding.btnTransaksi.setOnClickListener {
            val menutransaksi = Intent(this@MenuAdmin1, KelolaTransaksi4::class.java)
            startActivity(menutransaksi)
        }
        binding.btnAnalisis.setOnClickListener {
            val menuanalisis = Intent(this@MenuAdmin1, AnalisaJualAmbilData5::class.java)
            startActivity(menuanalisis)
        }
        binding.logout.setOnClickListener {
            val logout = Intent(this@MenuAdmin1, Logout::class.java)
            startActivity(logout)
        }
        binding.btnLihatAnalisa.setOnClickListener {
            val visualisasi = Intent(this@MenuAdmin1, LihatAnalisa::class.java)
            startActivity(visualisasi)
        }
        binding.btnOrder.setOnClickListener {
            val order = Intent(this@MenuAdmin1, CekOrder::class.java)
            startActivity(order)
        }
        binding.tentang.setOnClickListener {
            val info = Intent(this@MenuAdmin1, MenuInfo::class.java)
            startActivity(info)
        }

        val notifordermasuk = binding.notifOrder
        notifordermasuk.webViewClient = object : WebViewClient(){
            override fun shouldOverrideUrlLoading(
                view: WebView?,
                url: String
            ): Boolean {
                view?.loadUrl(url)
                return true
            }
            override fun onReceivedError(view: WebView, errorCode: Int, description: String, failingUrl: String) {
                val masalahkoneksi = binding.notifOrder
                masalahkoneksi.webViewClient = object : WebViewClient() {
                    override fun shouldOverrideUrlLoading(view: WebView, url: String): Boolean {
                        view.loadUrl(url)
                        return false
                    }
                }
                masalahkoneksi.loadUrl("file:///android_asset/blank.html")
                val timeout = Intent(this@MenuAdmin1, LoginRegister::class.java)
                startActivity(timeout)
            }
        }
        notifordermasuk.loadUrl("https://ubud-souvenir-center.my.id/android/notif/icon_order.php")
        notifordermasuk.settings.javaScriptEnabled=true
        notifordermasuk.settings.allowContentAccess=true
        notifordermasuk.settings.domStorageEnabled=true
        notifordermasuk.settings.loadWithOverviewMode=true
        notifordermasuk.scrollBarStyle= WebView.SCROLLBARS_INSIDE_OVERLAY
        notifordermasuk.isScrollbarFadingEnabled=true
        notifordermasuk.isVerticalScrollBarEnabled=true
        notifordermasuk.settings.builtInZoomControls=true
        notifordermasuk.setBackgroundColor(0)

        val notifstokhabis = binding.notifStok
        notifstokhabis.webViewClient = object : WebViewClient(){
            override fun shouldOverrideUrlLoading(
                view: WebView?,
                url: String
            ): Boolean {
                view?.loadUrl(url)
                return true
            }
            override fun onReceivedError(view: WebView, errorCode: Int, description: String, failingUrl: String) {
                val masalahkoneksi = binding.notifStok
                masalahkoneksi.webViewClient = object : WebViewClient() {
                    override fun shouldOverrideUrlLoading(view: WebView, url: String): Boolean {
                        view.loadUrl(url)
                        return false
                    }
                }
                masalahkoneksi.loadUrl("file:///android_asset/blank.html")
                val timeout = Intent(this@MenuAdmin1, LoginRegister::class.java)
                startActivity(timeout)
            }

        }
        notifstokhabis.loadUrl("https://ubud-souvenir-center.my.id/android/notif/icon_stok.php")
        notifstokhabis.settings.javaScriptEnabled=true
        notifstokhabis.settings.allowContentAccess=true
        notifstokhabis.settings.domStorageEnabled=true
        notifstokhabis.settings.loadWithOverviewMode=true
        notifstokhabis.scrollBarStyle= WebView.SCROLLBARS_INSIDE_OVERLAY
        notifstokhabis.isScrollbarFadingEnabled=true
        notifstokhabis.isVerticalScrollBarEnabled=true
        notifstokhabis.settings.builtInZoomControls=true
        notifstokhabis.setBackgroundColor(0)

        val header = binding.header
        header.webChromeClient = object : WebChromeClient(){
            override fun onProgressChanged(load : WebView, newProgress : Int) {
                if (newProgress == 100) {
                    val load1 = binding.headermenu
                    load1.loadUrl("file:///android_asset/blank.html")
                } else {
                    val load2 = binding.headermenu
                    load2.loadUrl("file:///android_asset/load_gif.html")
                }
            }
        }
        header.webViewClient = object : WebViewClient(){
            override fun shouldOverrideUrlLoading(
                view: WebView?,
                url: String
            ): Boolean {
                view?.loadUrl(url)
                return true
            }
            override fun onReceivedError(view: WebView, errorCode: Int, description: String, failingUrl: String) {
                val masalahkoneksi = binding.header
                masalahkoneksi.webViewClient = object : WebViewClient() {
                    override fun shouldOverrideUrlLoading(view: WebView, url: String): Boolean {
                        view.loadUrl(url)
                        return false
                    }
                }
                masalahkoneksi.loadUrl("file:///android_asset/koneksi_else.html")
                val timeout = Intent(this@MenuAdmin1, LoginRegister::class.java)
                startActivity(timeout)
            }
        }
        header.loadUrl("https://ubud-souvenir-center.my.id/android/1_login_reg/header_menu.php")
        header.settings.javaScriptEnabled=true
        header.settings.allowContentAccess=true
        header.settings.domStorageEnabled=true
        header.settings.loadWithOverviewMode=true
        header.scrollBarStyle= WebView.SCROLLBARS_INSIDE_OVERLAY
        header.isScrollbarFadingEnabled=true
        header.isVerticalScrollBarEnabled=true
        header.settings.builtInZoomControls=true
    }

    override fun onConnectionChange(isConnected: Boolean) {
        if (!isConnected) {
            val intent = Intent(this@MenuAdmin1, StatusDiskoneksi::class.java)
            startActivity(intent)
        }
    }

    override fun onCreateOptionsMenu(menu: Menu): Boolean {
        menuInflater.inflate(R.menu.options_menu, menu)
        return true
    }

    override fun onOptionsItemSelected(item: MenuItem): Boolean {
        return when (item.itemId) {
            R.id.main_menu -> {
                val about = Intent(this@MenuAdmin1, MenuAdmin1::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_toko -> {
                val about = Intent(this@MenuAdmin1, InformasiToko2::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_order -> {
                val about = Intent(this@MenuAdmin1, CekOrder::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_produk -> {
                val about = Intent(this@MenuAdmin1, KelolaProduk3::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_transaksi -> {
                val about = Intent(this@MenuAdmin1, KelolaTransaksi4::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_proses_analisa-> {
                val about = Intent(this@MenuAdmin1, AnalisaJualAmbilData5::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_lihat_analisa -> {
                val about = Intent(this@MenuAdmin1, LihatAnalisa::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_logout -> {
                val about = Intent(this@MenuAdmin1, Logout::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_riwayat_order -> {
                val about = Intent(this@MenuAdmin1, RiwayatOrder::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_kontak -> {
                val about = Intent(this@MenuAdmin1, MenuInfo::class.java)
                startActivity(about)
                true
            }
            R.id.tutup_aplikasi -> {
                android.app.AlertDialog.Builder(this).setIcon(android.R.drawable.ic_dialog_alert)
                    .setTitle("Konfirmasi").setMessage("Yakin ingin menutup aplikasi ?")
                    .setPositiveButton("YA"
                    ) { _, _ ->
                        finishAffinity()
                        Toast.makeText(this@MenuAdmin1, "Aplikasi Ditutup", Toast.LENGTH_SHORT)
                            .show()
                    }.setNegativeButton("TIDAK", null).show()
                true
            }
            else -> super.onOptionsItemSelected(item)
        }
    }
}