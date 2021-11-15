package com.example.ubud_souvenir_center

import android.annotation.SuppressLint
import android.app.DownloadManager
import android.content.Context
import android.content.Intent
import android.net.Uri
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.os.Environment
import android.view.Menu
import android.view.MenuItem
import android.webkit.*
import android.widget.Toast
import androidx.appcompat.app.AlertDialog
import com.example.ubud_souvenir_center.databinding.ActivityAnalisaJualAmbilData5Binding
import com.example.ubudsouvenircenter.*

@Suppress("DEPRECATION")
class AnalisaJualAmbilData5 : AppCompatActivity() {
    @SuppressLint("SetJavaScriptEnabled")
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        val binding = ActivityAnalisaJualAmbilData5Binding.inflate(layoutInflater)
        setContentView(binding.root)

        binding.textView29.setOnClickListener {
            val kembali5 = Intent(this@AnalisaJualAmbilData5, MenuAdmin1::class.java)
            startActivity(kembali5)
        }

        val activityminsup = this
        val minsup = binding.minsup
        minsup.webChromeClient = object : WebChromeClient(){
            override fun onJsAlert(view: WebView, url: String, message: String, result: JsResult): Boolean {
                AlertDialog.Builder(activityminsup)
                    .setTitle("Peringatan !!")
                    .setMessage(message)
                    .setPositiveButton(android.R.string.ok) { _, _ -> result.confirm() }.setCancelable(false).create().show()
                return true
            }

            override fun onJsConfirm(view: WebView, url: String, message: String, result: JsResult): Boolean {
                AlertDialog.Builder(activityminsup)
                    .setTitle("Konfirmasi")
                    .setMessage(message)
                    .setPositiveButton(android.R.string.ok) { _, _ -> result.confirm() }
                    .setNegativeButton(android.R.string.cancel) { _, _ -> result.cancel() }.setCancelable(false).create().show()
                return true
            }

            override fun onReceivedTitle(view: WebView?, minsup: String?) {
                window.setTitle(minsup)
            }

            override fun onProgressChanged(load : WebView, newProgress : Int) {
                if (newProgress == 100) {
                    val load1 = binding.headerprosesanalisa
                    load1.loadUrl("file:///android_asset/blank.html")
                }
            }
        }
        minsup.webViewClient = object : WebViewClient() {
            override fun shouldOverrideUrlLoading(view: WebView, url: String): Boolean {
                view.loadUrl(url)
                return false
            }

            override fun onReceivedError(view: WebView, errorCode: Int, description: String, failingUrl: String) {
                val masalahkoneksi = binding.minsup
                masalahkoneksi.webViewClient = object : WebViewClient() {
                    override fun shouldOverrideUrlLoading(view: WebView, url: String): Boolean {
                        view.loadUrl(url)
                        return false
                    }
                }
                masalahkoneksi.loadUrl("file:///android_asset/koneksi_else.html")
                val halamanlogin = Intent(this@AnalisaJualAmbilData5, LoginRegister::class.java)
                startActivity(halamanlogin)
            }
        }
        minsup.setDownloadListener { url, userAgent, contentDisposition, mimeType, _ ->
            val request = DownloadManager.Request(Uri.parse(url))
            request.setMimeType(mimeType)
            request.addRequestHeader("cookie", CookieManager.getInstance().getCookie(url))
            request.addRequestHeader("User-Agent", userAgent)
            request.setDescription("Mengunduh File...")
            request.setTitle(URLUtil.guessFileName(url, contentDisposition, mimeType))
            request.allowScanningByMediaScanner()
            request.setNotificationVisibility(DownloadManager.Request.VISIBILITY_VISIBLE_NOTIFY_COMPLETED)
            request.setDestinationInExternalFilesDir(
                this@AnalisaJualAmbilData5,
                Environment.DIRECTORY_DOWNLOADS,
                ".png"
            )
            request.setDestinationInExternalPublicDir(
                Environment.DIRECTORY_DOWNLOADS,
                URLUtil.guessFileName(url, contentDisposition, mimeType)
            )
            val dm = getSystemService(Context.DOWNLOAD_SERVICE) as DownloadManager
            dm.enqueue(request)
            Toast.makeText(applicationContext, "Mengunduh File", Toast.LENGTH_LONG).show()
        }
        if (savedInstanceState == null) {
            minsup.loadUrl("https://ubud-souvenir-center.my.id/android/5_analisa/set_minimum_support.php")
        }
        minsup.settings.javaScriptEnabled=true
        minsup.settings.allowContentAccess=true
        minsup.settings.domStorageEnabled=true
        minsup.settings.loadWithOverviewMode=true
        minsup.scrollBarStyle= WebView.SCROLLBARS_INSIDE_OVERLAY
        minsup.isScrollbarFadingEnabled=false
        minsup.isVerticalScrollBarEnabled=true
        minsup.settings.builtInZoomControls=true

        val activity5 = this
        val ambiltrans = binding.ambilTransaksi
        ambiltrans.webChromeClient = object : WebChromeClient(){
            override fun onJsAlert(view: WebView, url: String, message: String, result: JsResult): Boolean {
                AlertDialog.Builder(activity5)
                    .setTitle("Peringatan !!")
                    .setMessage(message)
                    .setPositiveButton(android.R.string.ok) { _, _ -> result.confirm() }.setCancelable(false).create().show()
                return true
            }

            override fun onJsConfirm(view: WebView, url: String, message: String, result: JsResult): Boolean {
                AlertDialog.Builder(activity5)
                    .setTitle("Konfirmasi")
                    .setMessage(message)
                    .setPositiveButton(android.R.string.ok) { _, _ -> result.confirm() }
                    .setNegativeButton(android.R.string.cancel) { _, _ -> result.cancel() }.setCancelable(false).create().show()
                return true
            }

            override fun onReceivedTitle(view: WebView?, ambil_trans: String?) {
                window.setTitle(ambil_trans)
            }

            override fun onProgressChanged(load : WebView, newProgress : Int) {
                if (newProgress == 100) {
                    val load1 = binding.headerprosesanalisa
                    load1.loadUrl("file:///android_asset/blank.html")
                } else {
                    val load2 = binding.headerprosesanalisa
                    load2.loadUrl("file:///android_asset/load_gif.html")
                }
            }
        }
        ambiltrans.webViewClient = object : WebViewClient() {
            override fun shouldOverrideUrlLoading(view: WebView, url: String): Boolean {
                view.loadUrl(url)
                return false
            }

            override fun onReceivedError(view: WebView, errorCode: Int, description: String, failingUrl: String) {
                val masalahkoneksi = binding.ambilTransaksi
                masalahkoneksi.webViewClient = object : WebViewClient() {
                    override fun shouldOverrideUrlLoading(view: WebView, url: String): Boolean {
                        view.loadUrl(url)
                        return false
                    }
                }
                masalahkoneksi.loadUrl("file:///android_asset/koneksi_else.html")
                val halamanlogin = Intent(this@AnalisaJualAmbilData5, LoginRegister::class.java)
                startActivity(halamanlogin)
            }
        }
        ambiltrans.setDownloadListener { url, userAgent, contentDisposition, mimeType, _ ->
            val request = DownloadManager.Request(Uri.parse(url))
            request.setMimeType(mimeType)
            request.addRequestHeader("cookie", CookieManager.getInstance().getCookie(url))
            request.addRequestHeader("User-Agent", userAgent)
            request.setDescription("Mengunduh File...")
            request.setTitle(URLUtil.guessFileName(url, contentDisposition, mimeType))
            request.allowScanningByMediaScanner()
            request.setNotificationVisibility(DownloadManager.Request.VISIBILITY_VISIBLE_NOTIFY_COMPLETED)
            request.setDestinationInExternalFilesDir(
                this@AnalisaJualAmbilData5,
                Environment.DIRECTORY_DOWNLOADS,
                ".png"
            )
            request.setDestinationInExternalPublicDir(
                Environment.DIRECTORY_DOWNLOADS,
                URLUtil.guessFileName(url, contentDisposition, mimeType)
            )
            val dm = getSystemService(Context.DOWNLOAD_SERVICE) as DownloadManager
            dm.enqueue(request)
            Toast.makeText(applicationContext, "Mengunduh File", Toast.LENGTH_LONG).show()
        }
        ambiltrans.loadUrl("https://ubud-souvenir-center.my.id/android/5_analisa/1_ambil_transaksi.php")
        ambiltrans.settings.javaScriptEnabled=true
        ambiltrans.settings.allowContentAccess=true
        ambiltrans.settings.domStorageEnabled=true
        ambiltrans.settings.loadWithOverviewMode=true
        ambiltrans.scrollBarStyle= WebView.SCROLLBARS_INSIDE_OVERLAY
        ambiltrans.isScrollbarFadingEnabled=false
        ambiltrans.isVerticalScrollBarEnabled=true
        ambiltrans.settings.builtInZoomControls=true
    }

    override fun onCreateOptionsMenu(menu: Menu): Boolean {
        menuInflater.inflate(R.menu.options_menu, menu)
        return true
    }

    override fun onOptionsItemSelected(item: MenuItem): Boolean {
        return when (item.itemId) {
            R.id.main_menu -> {
                val about = Intent(this@AnalisaJualAmbilData5, MenuAdmin1::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_toko -> {
                val about = Intent(this@AnalisaJualAmbilData5, InformasiToko2::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_order -> {
                val about = Intent(this@AnalisaJualAmbilData5, CekOrder::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_produk -> {
                val about = Intent(this@AnalisaJualAmbilData5, KelolaProduk3::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_transaksi -> {
                val about = Intent(this@AnalisaJualAmbilData5, KelolaTransaksi4::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_proses_analisa-> {
                val about = Intent(this@AnalisaJualAmbilData5, AnalisaJualAmbilData5::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_lihat_analisa -> {
                val about = Intent(this@AnalisaJualAmbilData5, LihatAnalisa::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_logout -> {
                val about = Intent(this@AnalisaJualAmbilData5, Logout::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_riwayat_order -> {
                val about = Intent(this@AnalisaJualAmbilData5, RiwayatOrder::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_kontak -> {
                val about = Intent(this@AnalisaJualAmbilData5, MenuInfo::class.java)
                startActivity(about)
                true
            }
            R.id.tutup_aplikasi -> {
                android.app.AlertDialog.Builder(this).setIcon(android.R.drawable.ic_dialog_alert)
                    .setTitle("Konfirmasi").setMessage("Yakin ingin menutup aplikasi ?")
                    .setPositiveButton("YA"
                    ) { _, _ ->
                        finishAffinity()
                        Toast.makeText(
                            this@AnalisaJualAmbilData5,
                            "Aplikasi Ditutup",
                            Toast.LENGTH_SHORT
                        ).show()
                    }.setNegativeButton("TIDAK", null).show()
                true
            }
            else -> super.onOptionsItemSelected(item)
        }
    }
}