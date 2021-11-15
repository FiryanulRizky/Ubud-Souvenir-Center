package com.example.ubudsouvenircenter

import android.Manifest
import android.annotation.SuppressLint
import android.app.Activity
import android.app.DownloadManager
import android.content.Context
import android.content.Intent
import android.content.pm.PackageManager
import android.net.Uri
import android.os.Build
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.os.Environment
import android.provider.MediaStore
import android.util.Log
import android.view.Menu
import android.view.MenuItem
import android.webkit.*
import android.widget.Toast
import androidx.appcompat.app.AlertDialog
import androidx.core.app.ActivityCompat
import androidx.core.content.ContextCompat
import com.example.ubud_souvenir_center.AnalisaJualAmbilData5
import com.example.ubud_souvenir_center.MenuAdmin1
import com.example.ubud_souvenir_center.R
import com.example.ubud_souvenir_center.RiwayatOrder
import com.example.ubud_souvenir_center.databinding.ActivityKelolaProduk3Binding
import java.io.File
import java.io.IOException
import java.text.SimpleDateFormat
import java.util.*

@Suppress("DEPRECATION")
class KelolaProduk3 : AppCompatActivity() {
    private var mUploadMessage: ValueCallback<Uri?>? = null
    private var mCapturedImageURI: Uri? = null
    private var mFilePathCallback: ValueCallback<Array<Uri>>? = null
    private var mCameraPhotoPath: String? = null
    public override fun onActivityResult(requestCode: Int, resultCode: Int, data: Intent?) {
        if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.LOLLIPOP) {
            if (requestCode != INPUT_FILE_REQUEST_CODE || mFilePathCallback == null) {
                super.onActivityResult(requestCode, resultCode, data)
                return
            }
            var results: Array<Uri>? = null
            if (resultCode == Activity.RESULT_OK) {
                if (data == null) {
                    if (mCameraPhotoPath != null) {
                        results = arrayOf(Uri.parse(mCameraPhotoPath))
                    }
                } else {
                    val dataString = data.dataString
                    if (dataString != null) {
                        results = arrayOf(Uri.parse(dataString))
                    }
                }
            }
            mFilePathCallback!!.onReceiveValue(results)
            mFilePathCallback = null
        } else if (Build.VERSION.SDK_INT <= Build.VERSION_CODES.KITKAT) {
            if (requestCode != FILECHOOSER_RESULTCODE || mUploadMessage == null) {
                super.onActivityResult(requestCode, resultCode, data)
                return
            }
            if (requestCode == FILECHOOSER_RESULTCODE) {
                if (null == mUploadMessage) {
                    return
                }
                var result: Uri? = null
                try {
                    result = if (resultCode != Activity.RESULT_OK) {
                        null
                    } else {
                        if (data == null) mCapturedImageURI else data.data
                    }
                } catch (e: Exception) {
                    Toast.makeText(applicationContext, "activity :$e",
                            Toast.LENGTH_LONG).show()
                }
                mUploadMessage!!.onReceiveValue(result)
                mUploadMessage = null
            }
        }
        return
    }

    @SuppressLint("SetJavaScriptEnabled", "ObsoleteSdkInt")
    override fun onCreate(savedInstanceState: Bundle?) {
    super.onCreate(savedInstanceState)
        val binding = ActivityKelolaProduk3Binding.inflate(layoutInflater)
        setContentView(binding.root)

    binding.dariprodukkemenu.setOnClickListener {
        val kembali3 = Intent(this@KelolaProduk3, MenuAdmin1::class.java)
        startActivity(kembali3)
    }

        val produk = binding.produk
        if (Build.VERSION.SDK_INT >= 16 && (ContextCompat.checkSelfPermission(this, Manifest.permission.WRITE_EXTERNAL_STORAGE) != PackageManager.PERMISSION_GRANTED || ContextCompat.checkSelfPermission(this, Manifest.permission.CAMERA) != PackageManager.PERMISSION_GRANTED)) {
            ActivityCompat.requestPermissions(this@KelolaProduk3, arrayOf(Manifest.permission.WRITE_EXTERNAL_STORAGE, Manifest.permission.CAMERA), 1)
        }
        val activityproduk = this
        val produkSettings = produk.settings
        produkSettings.javaScriptEnabled = true
        produkSettings.allowFileAccess = true
        produk.settings.setSupportZoom(true)
        produk.settings.builtInZoomControls = true
        produk.setDownloadListener { url, userAgent, contentDisposition, mimeType, _ ->
            val request = DownloadManager.Request(Uri.parse(url))
            request.setMimeType(mimeType)
            request.addRequestHeader("cookie", CookieManager.getInstance().getCookie(url))
            request.addRequestHeader("User-Agent", userAgent)
            request.setDescription("Mengunduh File...")
            request.setTitle(URLUtil.guessFileName(url, contentDisposition, mimeType))
            request.allowScanningByMediaScanner()
            request.setNotificationVisibility(DownloadManager.Request.VISIBILITY_VISIBLE_NOTIFY_COMPLETED)
            request.setDestinationInExternalFilesDir(
                this@KelolaProduk3,
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
            produk.loadUrl("https://ubud-souvenir-center.my.id/android/3_kelola_produk/item.php")
        }
        produk.webChromeClient = object : WebChromeClient() {
            @SuppressLint("SimpleDateFormat")
            @Throws(IOException::class)
            private fun createImageFile(): File {
                val timeStamp = SimpleDateFormat("yyyyMMdd_HHmmss").format(Date())
                val imageFileName = "JPEG_" + timeStamp + "_"
                val storageDir = Environment.getExternalStoragePublicDirectory(
                    Environment.DIRECTORY_PICTURES)
                return File.createTempFile(
                    imageFileName,  /* prefix */
                    ".jpg",  /* suffix */
                    storageDir /* directory */
                )
            }

            override fun onJsAlert(view: WebView, url: String, message: String, result: JsResult): Boolean {
                AlertDialog.Builder(activityproduk)
                    .setTitle("Peringatan !!")
                    .setMessage(message)
                    .setPositiveButton(android.R.string.ok) { _, _ -> result.confirm() }.setCancelable(false).create().show()
                return true
            }

            override fun onJsConfirm(view: WebView, url: String, message: String, result: JsResult): Boolean {
                AlertDialog.Builder(activityproduk)
                    .setTitle("Konfirmasi")
                    .setMessage(message)
                    .setPositiveButton(android.R.string.ok) { _, _ -> result.confirm() }
                    .setNegativeButton(android.R.string.cancel) { _, _ -> result.cancel() }.setCancelable(false).create().show()
                return true
            }

            @SuppressLint("QueryPermissionsNeeded")
            override fun onShowFileChooser(view: WebView, filePath: ValueCallback<Array<Uri>>, fileChooserParams: FileChooserParams): Boolean {
                if (mFilePathCallback != null) {
                    mFilePathCallback!!.onReceiveValue(null)
                }
                mFilePathCallback = filePath
                var takePictureIntent: Intent? = Intent(MediaStore.ACTION_IMAGE_CAPTURE)
                if (takePictureIntent!!.resolveActivity(packageManager) != null) {
                    var photoFile: File? = null
                    try {
                        photoFile = createImageFile()
                        takePictureIntent.putExtra("PhotoPath", mCameraPhotoPath)
                    } catch (ex: IOException) {
                        Log.e(TAG, "Unable to create Image File", ex)
                    }
                    if (photoFile != null) {
                        mCameraPhotoPath = "file:" + photoFile.absolutePath
                        takePictureIntent.putExtra(MediaStore.EXTRA_OUTPUT,
                            Uri.fromFile(photoFile))
                    } else {
                        takePictureIntent = null
                    }
                }
                val contentSelectionIntent = Intent(Intent.ACTION_GET_CONTENT)
                contentSelectionIntent.addCategory(Intent.CATEGORY_OPENABLE)
                contentSelectionIntent.type = "image/*"
                val intentArray: Array<Intent?> = arrayOf(takePictureIntent)
                val chooserIntent = Intent(Intent.ACTION_CHOOSER)
                chooserIntent.putExtra(Intent.EXTRA_INTENT, contentSelectionIntent)
                chooserIntent.putExtra(Intent.EXTRA_TITLE, "Image Chooser")
                chooserIntent.putExtra(Intent.EXTRA_INITIAL_INTENTS, intentArray)
                startActivityForResult(chooserIntent, INPUT_FILE_REQUEST_CODE)
                return true
            }

            override fun onProgressChanged(load : WebView, newProgress : Int) {
                if (newProgress == 100) {
                    val load1 = binding.headerproduk
                    load1.loadUrl("file:///android_asset/blank.html")
                } else {
                    val load2 = binding.headerproduk
                    load2.loadUrl("file:///android_asset/load_gif.html")
                }
            }
        }
        produk.webViewClient = object : WebViewClient() {
            override fun shouldOverrideUrlLoading(
                view: WebView?,
                url: String
            ): Boolean {
                view?.loadUrl(url)
                return true
            }
            override fun onReceivedError(view: WebView, errorCode: Int, description: String, failingUrl: String) {
                val masalahkoneksi = binding.produk
                masalahkoneksi.webViewClient = object : WebViewClient() {
                    override fun shouldOverrideUrlLoading(view: WebView, url: String): Boolean {
                        view.loadUrl(url)
                        return false
                    }
                }
                masalahkoneksi.loadUrl("file:///android_asset/koneksi_else.html")
            }
        }
    }

    companion object {
        private const val INPUT_FILE_REQUEST_CODE = 1
        private const val FILECHOOSER_RESULTCODE = 1
        private val TAG = KelolaProduk3::class.java.simpleName
    }

    override fun onCreateOptionsMenu(menu: Menu): Boolean {
        menuInflater.inflate(R.menu.options_menu, menu)
        return true
    }

    override fun onOptionsItemSelected(item: MenuItem): Boolean {
        return when (item.itemId) {
            R.id.main_menu -> {
                val about = Intent(this@KelolaProduk3, MenuAdmin1::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_toko -> {
                val about = Intent(this@KelolaProduk3, InformasiToko2::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_order -> {
                val about = Intent(this@KelolaProduk3, CekOrder::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_produk -> {
                val about = Intent(this@KelolaProduk3, KelolaProduk3::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_transaksi -> {
                val about = Intent(this@KelolaProduk3, KelolaTransaksi4::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_proses_analisa-> {
                val about = Intent(this@KelolaProduk3, AnalisaJualAmbilData5::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_lihat_analisa -> {
                val about = Intent(this@KelolaProduk3, LihatAnalisa::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_logout -> {
                val about = Intent(this@KelolaProduk3, Logout::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_riwayat_order -> {
                val about = Intent(this@KelolaProduk3, RiwayatOrder::class.java)
                startActivity(about)
                true
            }
            R.id.halaman_kontak -> {
                val about = Intent(this@KelolaProduk3, MenuInfo::class.java)
                startActivity(about)
                true
            }
            R.id.tutup_aplikasi -> {
                android.app.AlertDialog.Builder(this).setIcon(android.R.drawable.ic_dialog_alert)
                    .setTitle("Konfirmasi").setMessage("Yakin ingin menutup aplikasi ?")
                    .setPositiveButton("YA"
                    ) { _, _ ->
                        finishAffinity()
                        Toast.makeText(this@KelolaProduk3, "Aplikasi Ditutup", Toast.LENGTH_SHORT)
                            .show()
                    }.setNegativeButton("TIDAK", null).show()
                true
            }
            else -> super.onOptionsItemSelected(item)
        }
    }
}