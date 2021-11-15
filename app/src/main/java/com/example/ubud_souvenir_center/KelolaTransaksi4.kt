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
import androidx.appcompat.app.AlertDialog
import com.example.ubud_souvenir_center.AnalisaJualAmbilData5
import com.example.ubud_souvenir_center.MenuAdmin1
import com.example.ubud_souvenir_center.R
import com.example.ubud_souvenir_center.RiwayatOrder
import com.example.ubud_souvenir_center.databinding.ActivityKelolaTransaksi4Binding

@Suppress("DEPRECATION")
class KelolaTransaksi4 : AppCompatActivity() {

    @SuppressLint("SetJavaScriptEnabled")
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        val binding = ActivityKelolaTransaksi4Binding.inflate(layoutInflater)
        setContentView(binding.root)

        binding.btnkembalitrans.setOnClickListener {
            val kembali4 = Intent(this@KelolaTransaksi4, MenuAdmin1::class.java)
            startActivity(kembali4)
        }

        val activitytrans = this
        val transaksival = binding.transaksi
        transaksival.webChromeClient = object : WebChromeClient(){
            override fun onJsAlert(view: WebView, url: String, message: String, result: JsResult): Boolean {
                AlertDialog.Builder(activitytrans)
                    .setTitle("Peringatan !!")
                    .setMessage(message)
                    .setPositiveButton(android.R.string.ok) { _, _ -> result.confirm() }.setCancelable(false).create().show()
                return true
            }

            override fun onJsConfirm(view: WebView, url: String, message: String, result: JsResult): Boolean {
                AlertDialog.Builder(activitytrans)
                    .setTitle("Konfirmasi")
                    .setMessage(message)
                    .setPositiveButton(android.R.string.ok) { _, _ -> result.confirm() }
                    .setNegativeButton(android.R.string.cancel) { _, _ -> result.cancel() }.setCancelable(false).create().show()
                return true
            }

            override fun onReceivedTitle(view: WebView?, transaksi_val: String?) {
                window.setTitle(transaksi_val)
            }

            override fun onProgressChanged(load : WebView, newProgress : Int) {
                if (newProgress == 100) {
                    val load1 = binding.headertransaksi
                    load1.loadUrl("file:///android_asset/blank.html")
                } else {
                    val load2 = binding.headertransaksi
                    load2.loadUrl("file:///android_asset/load_gif.html")
                }
            }
        }
        transaksival.setDownloadListener { url, userAgent, contentDisposition, mimeType, _ ->
            val request = DownloadManager.Request(Uri.parse(url))
            request.setMimeType(mimeType)
            request.addRequestHeader("cookie", CookieManager.getInstance().getCookie(url))
            request.addRequestHeader("User-Agent", userAgent)
            request.setDescription("Mengunduh File...")
            request.setTitle(URLUtil.guessFileName(url, contentDisposition, mimeType))
            request.allowScanningByMediaScanner()
            request.setNotificationVisibility(DownloadManager.Request.VISIBILITY_VISIBLE_NOTIFY_COMPLETED)
            request.setDestinationInExternalFilesDir(
                this@KelolaTransaksi4,
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
        transaksival.webViewClient = object : WebViewClient() {
            override fun shouldOverrideUrlLoading(view: WebView, url: String): Boolean {
                view.loadUrl(url)
                return false
            }

            override fun onReceivedError(view: WebView, errorCode: Int, description: String, failingUrl: String) {
                val masalahkoneksi = binding.transaksi
                masalahkoneksi.webViewClient = object : WebViewClient() {
                    override fun shouldOverrideUrlLoading(view: WebView, url: String): Boolean {
                        view.loadUrl(url)
                        return false
                    }
                }
                masalahkoneksi.loadUrl("file:///android_asset/koneksi_else.html")
                val halamanlogin = Intent(this@KelolaTransaksi4, LoginRegister::class.java)
                startActivity(halamanlogin)
            }
        }
        if (savedInstanceState == null) {
            transaksival.loadUrl("https://ubud-souvenir-center.my.id/android/4_kelola_transaksi/transaksi.php")
        }
        transaksival.settings.javaScriptEnabled=true
        transaksival.settings.allowContentAccess=true
        transaksival.settings.domStorageEnabled=true
        transaksival.settings.loadWithOverviewMode=true
        transaksival.scrollBarStyle= WebView.SCROLLBARS_INSIDE_OVERLAY
        transaksival.isScrollbarFadingEnabled=false
        transaksival.isVerticalScrollBarEnabled=true
        transaksival.settings.builtInZoomControls=true
    }

    override fun onCreateOptionsMenu(menu: Menu): Boolean {
        menuInflater.inflate(R.menu.options_menu, menu)
        return true
    }

    override fun onOptionsItemSelected(item: MenuItem): Boolean {
        return when (item.itemId) {
            R.id.main_menu -> {
                val about = Intent(this@KelolaTransaksi4, MenuAdmin1::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_toko -> {
                val about = Intent(this@KelolaTransaksi4, InformasiToko2::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_order -> {
                val about = Intent(this@KelolaTransaksi4, CekOrder::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_produk -> {
                val about = Intent(this@KelolaTransaksi4, KelolaProduk3::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_transaksi -> {
                val about = Intent(this@KelolaTransaksi4, KelolaTransaksi4::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_proses_analisa-> {
                val about = Intent(this@KelolaTransaksi4, AnalisaJualAmbilData5::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_lihat_analisa -> {
                val about = Intent(this@KelolaTransaksi4, LihatAnalisa::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_logout -> {
                val about = Intent(this@KelolaTransaksi4, Logout::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_riwayat_order -> {
                val about = Intent(this@KelolaTransaksi4, RiwayatOrder::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_kontak -> {
                val about = Intent(this@KelolaTransaksi4, MenuInfo::class.java)
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
                            this@KelolaTransaksi4,
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