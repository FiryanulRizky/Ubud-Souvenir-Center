package com.example.ubud_souvenir_center

import android.Manifest
import android.annotation.SuppressLint
import android.content.Intent
import android.os.Bundle
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.webkit.WebSettings
import android.webkit.WebView
import android.webkit.WebViewClient
import androidx.appcompat.app.AlertDialog
import androidx.fragment.app.Fragment
import com.example.ubud_souvenir_center.databinding.ActivityScanFragmentBinding
import com.google.zxing.BarcodeFormat
import com.google.zxing.ResultPoint
import com.google.zxing.client.android.BeepManager
import com.journeyapps.barcodescanner.BarcodeCallback
import com.journeyapps.barcodescanner.BarcodeResult
import com.journeyapps.barcodescanner.DecoratedBarcodeView
import com.journeyapps.barcodescanner.DefaultDecoderFactory
import pub.devrel.easypermissions.AfterPermissionGranted
import pub.devrel.easypermissions.EasyPermissions

class ScanFragment : Fragment(), EasyPermissions.PermissionCallbacks {

    private var _binding : ActivityScanFragmentBinding? = null
    private val binding get() = _binding!!

    private lateinit var beepManager: BeepManager
    private lateinit var scannerView: DecoratedBarcodeView

    @SuppressLint("SetJavaScriptEnabled")
    override fun onCreateView(
        inflater: LayoutInflater, container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View {

        _binding = ActivityScanFragmentBinding.inflate(inflater, container, false)
        val mWebView = binding.title
        mWebView.loadUrl("file:///android_asset/logo_scan.gif")
        val webSettings: WebSettings = mWebView.settings
        webSettings.javaScriptEnabled = true
        webSettings.useWideViewPort = true
        webSettings.loadWithOverviewMode = true
        mWebView.webViewClient = WebViewClient()

        val mWebView2 = binding.testKoneksi
        mWebView2.loadUrl("https://ubud-souvenir-center.my.id/test_koneksi/test.html")
        val webSettings2: WebSettings = mWebView2.settings
        webSettings2.javaScriptEnabled = true
        webSettings2.useWideViewPort = true
        webSettings2.loadWithOverviewMode = true
        mWebView2.webViewClient = object : WebViewClient() {
            override fun onReceivedError(view: WebView, errorCode: Int, description: String, failingUrl: String) {
                val intent = Intent(activity, MainActivity::class.java)
                startActivity(intent)
            }
        }

        scannerView = binding.QRScannerView

        val formats = mutableListOf(BarcodeFormat.QR_CODE)
        beepManager = BeepManager(requireActivity())
        scannerView.barcodeView.decoderFactory = DefaultDecoderFactory(formats)
        scannerView.setStatusText("")

        scannerView.decodeContinuous(object : BarcodeCallback {
            override fun barcodeResult(result: BarcodeResult?) {
                result?.let {
                    beepManager.isBeepEnabled = false
                    beepManager.playBeepSoundAndVibrate()

                    requireActivity().supportFragmentManager
                        .beginTransaction()
                        .replace(R.id.fragmentContainer, FragmentHasil.create(result.text), FragmentHasil.RESULT_FRAGMENT_TAG)
                        .addToBackStack(null)
                        .commit()
                }
            }

            override fun possibleResultPoints(resultPoints: MutableList<ResultPoint>?) {
            }
        })

        checkPermissionsAndStartQRScan()

        return binding.root
    }

    @AfterPermissionGranted(RC_CAMERA)
    private fun checkPermissionsAndStartQRScan() {
        val permission = Manifest.permission.CAMERA
        if (EasyPermissions.hasPermissions(requireContext(), permission)) {
            openScanner()
        } else {
            EasyPermissions.requestPermissions(
                this, getString(R.string.camera_permission_explanation),
                RC_CAMERA, permission
            )
        }
    }

    override fun onPause() {
        super.onPause()
        scannerView.pause()
    }

    override fun onResume() {
        super.onResume()
        scannerView.resume()
    }

    override fun onRequestPermissionsResult(
        requestCode: Int,
        permissions: Array<out String>,
        grantResults: IntArray
    ) {
        EasyPermissions.onRequestPermissionsResult(
            requestCode,
            permissions,
            grantResults, this
        )
    }

    override fun onPermissionsDenied(requestCode: Int, perms: MutableList<String>) {
        AlertDialog.Builder(requireContext())
            .setTitle(getString(R.string.permission_required_dialog_title))
            .setMessage(getString(R.string.permission_required_dialog_content))
            .setPositiveButton(android.R.string.ok
            ) { dialog, _ ->
                dialog.dismiss()
                checkPermissionsAndStartQRScan()
            }
            .setNegativeButton(android.R.string.cancel, null)
            .show()
    }

    override fun onPermissionsGranted(requestCode: Int, perms: MutableList<String>) {
        openScanner()
    }

    private fun openScanner() {
        scannerView.resume()
    }

    fun enableFlash(enable: Boolean) {
        if (enable) {
            scannerView.setTorchOn()
        } else {
            scannerView.setTorchOff()
        }
    }

    companion object {
        const val RC_CAMERA = 1
        const val SCANNER_FRAGMENT_TAG = "Scanner Fragment TAG"
    }
    override fun onDestroyView() {
        super.onDestroyView()
        _binding = null
    }
}