package com.example.ubud_souvenir_center

import android.annotation.SuppressLint
import android.app.DownloadManager
import android.content.Context
import android.content.Intent
import android.net.Uri
import android.os.Bundle
import android.os.Environment
import android.view.Menu
import android.view.MenuItem
import android.webkit.*
import android.widget.Toast
import androidx.appcompat.app.AlertDialog
import androidx.appcompat.app.AppCompatActivity
import com.example.ubud_souvenir_center.databinding.ActivityRiwayatOrderBinding
import com.example.ubudsouvenircenter.*

@Suppress("DEPRECATION")
class RiwayatOrder : AppCompatActivity() {

    @SuppressLint("SetJavaScriptEnabled")
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        val binding = ActivityRiwayatOrderBinding.inflate(layoutInflater)
        setContentView(binding.root)

        binding.btnRiwayatorder.setOnClickListener {
            val order = Intent(this@RiwayatOrder, MenuAdmin1::class.java)
            startActivity(order)
        }

        val riwayatorder = this
        val hisorder = binding.riwayatOrder
        hisorder.webChromeClient = object : WebChromeClient(){
            override fun onJsAlert(view: WebView, url: String, message: String, result: JsResult): Boolean {
                AlertDialog.Builder(riwayatorder)
                    .setTitle("Peringatan !!")
                    .setMessage(message)
                    .setPositiveButton(android.R.string.ok) { _, _ -> result.confirm() }.setCancelable(false).create().show()
                return true
            }

            override fun onJsConfirm(view: WebView, url: String, message: String, result: JsResult): Boolean {
                AlertDialog.Builder(riwayatorder)
                    .setTitle("Konfirmasi")
                    .setMessage(message)
                    .setPositiveButton(android.R.string.ok) { _, _ -> result.confirm() }
                    .setNegativeButton(android.R.string.cancel) { _, _ -> result.cancel() }.setCancelable(false).create().show()
                return true
            }

            override fun onReceivedTitle(view: WebView?, his_order: String?) {
                window.setTitle(his_order)
            }

            override fun onProgressChanged(load : WebView, newProgress : Int) {
                if (newProgress == 100) {
                    val load1 = binding.headerriwayatorder
                    load1.loadUrl("file:///android_asset/blank.html")
                } else {
                    val load2 = binding.headerriwayatorder
                    load2.loadUrl("file:///android_asset/load_gif.html")
                }
            }
        }
        hisorder.webViewClient = object : WebViewClient() {
            override fun shouldOverrideUrlLoading(view: WebView, url: String): Boolean {
                view.loadUrl(url)
                return false
            }

            override fun onReceivedError(view: WebView, errorCode: Int, description: String, failingUrl: String) {
                val masalahkoneksi = binding.riwayatOrder
                masalahkoneksi.webViewClient = object : WebViewClient() {
                    override fun shouldOverrideUrlLoading(view: WebView, url: String): Boolean {
                        view.loadUrl(url)
                        return false
                    }
                }
                masalahkoneksi.loadUrl("file:///android_asset/koneksi_else.html")
                val halamanlogin = Intent(this@RiwayatOrder, LoginRegister::class.java)
                startActivity(halamanlogin)
            }
        }
        hisorder.setDownloadListener { url, userAgent, contentDisposition, mimeType, _ ->
            val request = DownloadManager.Request(Uri.parse(url))
            request.setMimeType(mimeType)
            request.addRequestHeader("cookie", CookieManager.getInstance().getCookie(url))
            request.addRequestHeader("User-Agent", userAgent)
            request.setDescription("Mengunduh File...")
            request.setTitle(URLUtil.guessFileName(url, contentDisposition, mimeType))
            request.allowScanningByMediaScanner()
            request.setNotificationVisibility(DownloadManager.Request.VISIBILITY_VISIBLE_NOTIFY_COMPLETED)
            request.setDestinationInExternalFilesDir(
                this@RiwayatOrder,
                Environment.DIRECTORY_DOWNLOADS,
                URLUtil.guessFileName(url, contentDisposition, mimeType)
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
            hisorder.loadUrl("https://ubud-souvenir-center.my.id/dashboard_edit/riwayat_order_android.php")
        }
        hisorder.settings.javaScriptEnabled=true
        hisorder.settings.allowContentAccess=true
        hisorder.settings.domStorageEnabled=true
        hisorder.settings.loadWithOverviewMode=true
        hisorder.scrollBarStyle= WebView.SCROLLBARS_INSIDE_OVERLAY
        hisorder.isScrollbarFadingEnabled=false
        hisorder.isVerticalScrollBarEnabled=true
        hisorder.settings.builtInZoomControls=true
    }

    override fun onCreateOptionsMenu(menu: Menu): Boolean {
        menuInflater.inflate(R.menu.options_menu, menu)
        return true
    }

    override fun onOptionsItemSelected(item: MenuItem): Boolean {
        return when (item.itemId) {
            R.id.main_menu -> {
                val about = Intent(this@RiwayatOrder, MenuAdmin1::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_toko -> {
                val about = Intent(this@RiwayatOrder, InformasiToko2::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_order -> {
                val about = Intent(this@RiwayatOrder, CekOrder::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_produk -> {
                val about = Intent(this@RiwayatOrder, KelolaProduk3::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_transaksi -> {
                val about = Intent(this@RiwayatOrder, KelolaTransaksi4::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_proses_analisa-> {
                val about = Intent(this@RiwayatOrder, AnalisaJualAmbilData5::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_lihat_analisa -> {
                val about = Intent(this@RiwayatOrder, LihatAnalisa::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_logout -> {
                val about = Intent(this@RiwayatOrder, Logout::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_riwayat_order -> {
                val about = Intent(this@RiwayatOrder, RiwayatOrder::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_kontak -> {
                val about = Intent(this@RiwayatOrder, MenuInfo::class.java)
                startActivity(about)
                true
            }
            R.id.tutup_aplikasi -> {
                android.app.AlertDialog.Builder(this).setIcon(android.R.drawable.ic_dialog_alert)
                    .setTitle("Konfirmasi").setMessage("Yakin ingin menutup aplikasi ?")
                    .setPositiveButton("YA"
                    ) { _, _ ->
                        finishAffinity()
                        Toast.makeText(this@RiwayatOrder, "Aplikasi Ditutup", Toast.LENGTH_SHORT)
                            .show()
                    }.setNegativeButton("TIDAK", null).show()
                true
            }
            else -> super.onOptionsItemSelected(item)
        }
    }
}