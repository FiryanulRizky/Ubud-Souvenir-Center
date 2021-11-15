package com.example.ubud_souvenir_center

import android.content.Intent
import android.content.pm.PackageManager
import android.os.Bundle
import android.view.Menu
import android.view.MenuItem
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import androidx.core.content.ContextCompat
import androidx.fragment.app.Fragment
import androidx.fragment.app.FragmentManager
import com.example.ubud_souvenir_center.databinding.ActivityScanBinding

class ScanActivity : AppCompatActivity() {
    private lateinit var scanFragment: ScanFragment
    private var flashActive = false
    private var hideFlashMenu = false

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        val binding = ActivityScanBinding.inflate(layoutInflater)
        setContentView(binding.root)

        setSupportActionBar(binding.toolbar)

        scanFragment = ScanFragment()

        supportFragmentManager.beginTransaction()
            .add(R.id.fragmentContainer, scanFragment, ScanFragment.SCANNER_FRAGMENT_TAG)
            .commit()

        supportFragmentManager.registerFragmentLifecycleCallbacks(object: FragmentManager.FragmentLifecycleCallbacks() {
            override fun onFragmentResumed(fm: FragmentManager, fragment: Fragment) {
                super.onFragmentResumed(fm, fragment)

                if (fragment is ScanFragment) {
                    hideFlashMenu(false)
                } else if (fragment is FragmentHasil) {
                    hideFlashMenu(true)
                }

            }
        }, true)
    }

    override fun onCreateOptionsMenu(menu: Menu): Boolean {
        menuInflater.inflate(R.menu.options_scan_ecomm, menu)
        return true
    }

    override fun onPrepareOptionsMenu(menu: Menu): Boolean {
        if (!hasFlash()) {
            menu.findItem(R.id.action_flash).isVisible = false
        }

        menu.findItem(R.id.action_flash).isVisible = !hideFlashMenu

        if (flashActive) {
            menu.findItem(R.id.action_flash).icon = ContextCompat.getDrawable(this, R.drawable.ic_flash_off)
        } else {
            menu.findItem(R.id.action_flash).icon = ContextCompat.getDrawable(this, R.drawable.ic_flash_on)
        }

        return super.onPrepareOptionsMenu(menu)
    }

    private fun hasFlash(): Boolean {
        return applicationContext.packageManager
            .hasSystemFeature(PackageManager.FEATURE_CAMERA_FLASH)
    }

    override fun onOptionsItemSelected(item: MenuItem): Boolean {
        return when (item.itemId) {
            R.id.main_menu -> {
                val about = Intent(this@ScanActivity, MainActivity::class.java)
                startActivity(about)
                true
            }
            R.id.contact_developer -> {
                val about = Intent(this@ScanActivity, ContactDeveloper::class.java)
                startActivity(about)
                true
            }
            R.id.close_scan -> {
                android.app.AlertDialog.Builder(this).setIcon(android.R.drawable.ic_dialog_alert)
                    .setTitle("Closing Confirmation").setMessage("Sure you want to close this App ?")
                    .setPositiveButton("Yes"
                    ) { _, _ ->
                        finishAffinity()
                        Toast.makeText(
                            this@ScanActivity,
                            "Ubud Souvenir Center Closed",
                            Toast.LENGTH_SHORT
                        ).show()
                    }.setNegativeButton("No", null).show()
                true
            }
            R.id.action_flash -> {
                if (flashActive) {
                    flashActive = false
                    scanFragment.enableFlash(false)
                } else {
                    flashActive = true
                    scanFragment.enableFlash(true)
                }
                invalidateOptionsMenu()
                true
            }
            else -> super.onOptionsItemSelected(item)
        }
    }

    fun hideFlashMenu(hide: Boolean) {
        hideFlashMenu = hide
        invalidateOptionsMenu()
    }
}