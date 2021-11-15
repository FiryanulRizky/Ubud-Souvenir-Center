package com.example.ubudsouvenircenter

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
import com.example.ubud_souvenir_center.AnalisaJualAmbilData5
import com.example.ubud_souvenir_center.MenuAdmin1
import com.example.ubud_souvenir_center.R
import com.example.ubud_souvenir_center.RiwayatOrder
import com.example.ubud_souvenir_center.databinding.ActivityCekOrderBinding

@Suppress("DEPRECATION")
class CekOrder : AppCompatActivity() {

    @SuppressLint("SetJavaScriptEnabled")
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        val binding = ActivityCekOrderBinding.inflate(layoutInflater)
        setContentView(binding.root)

        binding.btnKembali1.setOnClickListener {
            val kembali1 = Intent(this@CekOrder, MenuAdmin1::class.java)
            startActivity(kembali1)
        }

        val cekorder = this
        val order : WebView = findViewById(R.id.order)
        order.webChromeClient = object : WebChromeClient(){
            override fun onJsAlert(view: WebView, url: String, message: String, result: JsResult): Boolean {
                androidx.appcompat.app.AlertDialog.Builder(cekorder)
                    .setTitle("Peringatan !!")
                    .setMessage(message)
                    .setPositiveButton(android.R.string.ok) { _, _ -> result.confirm() }.setCancelable(false).create().show()
                return true
            }

            override fun onJsConfirm(view: WebView, url: String, message: String, result: JsResult): Boolean {
                androidx.appcompat.app.AlertDialog.Builder(cekorder)
                    .setTitle("Konfirmasi")
                    .setMessage(message)
                    .setPositiveButton(android.R.string.ok) { _, _ -> result.confirm() }
                    .setNegativeButton(android.R.string.cancel) { _, _ -> result.cancel() }.setCancelable(false).create().show()
                return true
            }

            override fun onReceivedTitle(view: WebView?, order: String?) {
                window.setTitle(order) //Set Activity tile to page title.
            }

            override fun onProgressChanged(load : WebView, newProgress : Int) {
                if (newProgress == 100) {
                    val load1 = binding.headerordermasuk
                    load1.loadUrl("file:///android_asset/blank.html")
                } else {
                    val load2 = binding.headerordermasuk
                    load2.loadUrl("file:///android_asset/load_gif.html")
                }
            }
        }
        order.setDownloadListener { url, userAgent, contentDisposition, mimeType, _ ->
            val request = DownloadManager.Request(Uri.parse(url))
            request.setMimeType(mimeType)
            request.addRequestHeader("cookie", CookieManager.getInstance().getCookie(url))
            request.addRequestHeader("User-Agent", userAgent)
            request.setDescription("Mengunduh File...")
            request.setTitle(URLUtil.guessFileName(url, contentDisposition, mimeType))
            request.allowScanningByMediaScanner()
            request.setNotificationVisibility(DownloadManager.Request.VISIBILITY_VISIBLE_NOTIFY_COMPLETED)
            request.setDestinationInExternalFilesDir(
                this@CekOrder,
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
        order.webViewClient = object : WebViewClient() {
            override fun shouldOverrideUrlLoading(view: WebView, url: String): Boolean {
                view.loadUrl(url)
                return false
            }

            override fun onReceivedError(view: WebView, errorCode: Int, description: String, failingUrl: String) {
                val masalahkoneksi = binding.order
                masalahkoneksi.webViewClient = object : WebViewClient() {
                    override fun shouldOverrideUrlLoading(view: WebView, url: String): Boolean {
                        view.loadUrl(url)
                        return false
                    }
                }
                masalahkoneksi.loadUrl("file:///android_asset/koneksi_else.html")
                val halamanlogin = Intent(this@CekOrder, LoginRegister::class.java)
                startActivity(halamanlogin)
            }
        }
                if (savedInstanceState == null) {
                    order.loadUrl("https://ubud-souvenir-center.my.id/dashboard_edit/admin_order_android.php")
                }
                order.settings.javaScriptEnabled=true
                order.settings.allowContentAccess=true
                order.settings.domStorageEnabled=true
                order.scrollBarStyle= WebView.SCROLLBARS_INSIDE_OVERLAY
                order.isScrollbarFadingEnabled=false
                order.isVerticalScrollBarEnabled=true
                order.settings.builtInZoomControls=true
    }

    override fun onCreateOptionsMenu(menu: Menu): Boolean {
        menuInflater.inflate(R.menu.options_menu, menu)
        return true
    }

    override fun onOptionsItemSelected(item: MenuItem): Boolean {
        return when (item.itemId) {
            R.id.main_menu -> {
                val about = Intent(this@CekOrder, MenuAdmin1::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_toko -> {
                val about = Intent(this@CekOrder, InformasiToko2::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_order -> {
                val about = Intent(this@CekOrder, CekOrder::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_produk -> {
                val about = Intent(this@CekOrder, KelolaProduk3::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_transaksi -> {
                val about = Intent(this@CekOrder, KelolaTransaksi4::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_proses_analisa-> {
                val about = Intent(this@CekOrder, AnalisaJualAmbilData5::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_lihat_analisa -> {
                val about = Intent(this@CekOrder, LihatAnalisa::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_logout -> {
                val about = Intent(this@CekOrder, Logout::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_riwayat_order -> {
                val about = Intent(this@CekOrder, RiwayatOrder::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_kontak -> {
                val about = Intent(this@CekOrder, MenuInfo::class.java)
                startActivity(about)
                true
            }
            R.id.tutup_aplikasi -> {
                android.app.AlertDialog.Builder(this).setIcon(android.R.drawable.ic_dialog_alert)
                    .setTitle("Konfirmasi").setMessage("Yakin ingin menutup aplikasi ?")
                    .setPositiveButton("YA"
                    ) { _, _ ->
                        finishAffinity()
                        Toast.makeText(this@CekOrder, "Aplikasi Ditutup", Toast.LENGTH_SHORT)
                            .show()
                    }.setNegativeButton("TIDAK", null).show()
                true
            }
            else -> super.onOptionsItemSelected(item)
        }
    }
}
